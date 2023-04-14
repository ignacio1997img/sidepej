<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Inbox;
use App\Models\NameReservation;
use App\Models\Outbox;
use App\Models\Person;

use function PHPUnit\Framework\returnSelf;

class InboxController extends Controller
{
    public function index()
    {
        $funcionario = $this->getPerson(Auth::user()->people_id);

        $funcionario_id = null;

        if(auth()->user()->hasRole('admin'))
        {
            $funcionario_id = null;
        }
        else
        {
            if ($funcionario ) {
                $funcionario_id = $funcionario->id;                
            }
            else
            {
                return redirect()->back()->with(['message' => 'Falta tu código de funcionario contáctate con sistema para solucionarlo por favor.', 'alert-type' => 'error']);
            }
        }

       
        return view('inbox.browse', compact('funcionario_id'));
    }


    public function derivacion_list($type)
    {
        
        $paginate = request('paginate') ?? 10;
        $search = request('search') ?? null;

        $funcionario = $this->getPerson(Auth::user()->people_id);

        $query = 1;
        if($funcionario)
        {
            $query = 'people_id_para = '.$funcionario->id;
        }
        if(auth()->user()->hasRole('admin'))
        {
            $query =1;
        }
        switch ($type) {
            case 'pendientes':
                $derivaciones = Inbox::whereHas('outbox', function($q){
                                        $q->where('urgent', 0)->where('personeria', 1)->whereNotIn('estado_id', [4, 6]);
                                    })
                                    ->where('transferred', 0)->whereRaw($query)
                                    ->where('ok', '!=', 'ARCHIVADO')
                                    ->where(function($query) use ($search){
                                        if($search){
                                            $query->OrwhereHas('outbox', function($query) use($search){
                                                $query->whereRaw("(hr like '%$search%' or cite like '%$search%' or remitente like '%$search%' or referencia like '%$search%')");
                                            })
                                            ->OrWhereRaw("id = '$search'");
                                        }
                                    })
                                    ->orderBy('id', 'DESC')->paginate($paginate);
                                    // return 1;
                return view('inbox.pendientes', compact('derivaciones'));
                break;

            case 'urgentes':
                // dd($type);

                $derivaciones = Inbox::whereHas('outbox', function($q){
                                        $q->where('urgent', 1)->where('personeria', 1)->whereNotIn('estado_id', [4, 6]);
                                    })
                                    ->where('transferred', 0)->whereRaw($query)
                                    // ->where('people_id_para', $funcionario_id)
                                    ->where('ok', '!=', 'ARCHIVADO')
                                    ->where(function($query) use ($search){
                                        if($search){
                                            $query->OrwhereHas('outbox', function($query) use($search){
                                                $query->whereRaw("(hr like '%$search%' or cite like '%$search%' or remitente like '%$search%' or referencia like '%$search%')");
                                            })
                                            ->OrWhereRaw("id = '$search'");
                                        }
                                    })
                                    ->orderBy('id', 'DESC')->paginate($paginate);

                                    // dd($derivaciones);
                return view('inbox.urgentes', compact('derivaciones'));
                break;
            case 'archivados':
                $derivaciones = Inbox::whereHas('outbox', function($q){
                                        $q->where('personeria', 1);
                                    })
                                    ->where('transferred', 0)->whereRaw($query)
                                    ->where('ok', 'ARCHIVADO')
                                    ->where(function($query) use ($search){
                                        if($search){
                                            $query->OrwhereHas('outbox', function($query) use($search){
                                                $query->whereRaw("(hr like '%$search%' or cite like '%$search%' or remitente like '%$search%' or referencia like '%$search%')");
                                            })
                                            ->OrWhereRaw("id = '$search'");
                                        }
                                    })
                                        ->orderBy('id', 'DESC')->paginate($paginate);
                return view('inbox.archivados', compact('derivaciones'));
                break;

                

        }
    }


    public function show($id)
    {
        //Para ver el documento de de la personeria juridica
        try {
            $derivacion =  Inbox::where('id',$id)->first();    
            // return $derivacion;
    
            $derivacion->visto = Carbon::now();
            $derivacion->save();      
            // return 1;       
            $data = Outbox::with(['entity', 'estado', 'archivos', 'inbox' => function($q){
                $q->where('deleted_at',null);
                            }])
                            ->where('id', $derivacion->entrada_id)
                            ->where('deleted_at', NULL)
                            ->first();
        
            // return $data;
                        
            $ok = date("d-m-Y", strtotime($data->created_at));
            
            $origen = '';
            $destino = NULL;
            return view('inbox.read', compact('data', 'origen','derivacion', ));
        } catch (\Throwable $th) {
            return 0;
            //  dd($th);
            return redirect()->route('voyager.dashboard');
        }
    }


    //Para poder Archivar la Correspondencia de las personaria juridica
    public function derivacion_archivar(Request $request){
        // return $request;
        try {
            Inbox::where('id',$request->derivacion_id)->update(['ok'=>'ARCHIVADO']);
            return redirect()->route('inbox.index')->with(['message' => 'Correspondencia archivada exitosamente.', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('inbox.index')->with(['message' => 'Ocurrio un error.', 'alert-type' => 'error']);
        }
    }

}
