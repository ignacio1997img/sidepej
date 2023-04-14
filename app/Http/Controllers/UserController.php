<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    // para obrtener las personas interna o externas
    public function getFuncionario(Request $request){
        $search = $request->search;
        $type = $request->type;

                $personas = DB::connection('mamore')->table('people as p')
                    ->join('contracts as c', 'c.person_id', 'p.id')
                    ->select('p.id', 'p.first_name as nombre', 'p.last_name as apellido', 'p.ci' , DB::raw("CONCAT(p.first_name, ' ', p.last_name) as nombre_completo"))
                    ->where('c.status', 'firmado')
                    ->where('p.deleted_at', null)
                    ->where('c.deleted_at', null)
                    ->whereRaw('(p.ci like "%' .$search . '%" or '.DB::raw("CONCAT(p.first_name, ' ', p.last_name)"). 'like "%' . $search . '%")')
                    ->get();
                    $response = array();
                foreach($personas as $persona){

                    $response[] = array(
                        "id"=>$persona->id,
                        "text"=>$persona->nombre_completo,
                        "nombre" => $persona->nombre,
                        "apellido" => $persona->apellido,
                        "ci" => $persona->ci,
                    );
                }

        return response()->json($response);
    }
    public function store(Request $request){
        
        $ok = User::where('people_id', $request->funcionario_id)->first();
        if($ok)
        {
            return redirect()->route('voyager.users.index')->with(['message' => 'El Funcionario ya cuenta con usuario.', 'alert-type' => 'error']);
        }

        $ok = User::where('email', $request->email)->first();
        if($ok)
        {
            return redirect()->route('voyager.users.index')->with(['message' => 'Elija otro correo por favor.', 'alert-type' => 'error']);
        }
        
        DB::beginTransaction();
        try {

            //  Person::where('id', $request->funcionario_id)->first();
            
            $user = User::create([
                'ci'=> $this->getPerson($request->funcionario_id)->ci,
                'name' =>  $request->name,
                'people_id' => $request->funcionario_id,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'avatar' => 'users/default.png',
                'password' => bcrypt($request->password),
            ]);
            
            
            
            if ($request->user_belongstomany_role_relationship <> '') {
                $user->roles()->attach($request->user_belongstomany_role_relationship);
            }

            DB::commit();
            return redirect()->route('voyager.users.index')->with(['message' => "El usuario, se registro con exito.", 'alert-type' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('voyager.users.index')->with(['message' => 'Ocurrio un error.', 'alert-type' => 'error']);

        }     
    }
}
