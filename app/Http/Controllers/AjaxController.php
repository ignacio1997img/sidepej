<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AjaxController extends Controller
{
    public function getPeople()
    {
        // return DB::connection('mamore')->table('users');
    }
}
