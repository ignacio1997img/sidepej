<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\OfficeUser;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class OfficeController extends Controller
{
    public function show($id)
    {
        $data = Office::where('id', $id)->first();
        $user = OfficeUser::with('user')
                ->where('office_id', $data->id)->where('deleted_at', null)->get();
            
        // return $id;
        return view('office.read', compact('data', 'user'));
    }
}
