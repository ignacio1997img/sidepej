<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

        // $servername = "192.168.192.112";
        // $database = "gobe";
        // $username = "siscor";
        // $password = ".*Sscr2020*.";

        $n_server="143.198.165.60:3306";
        $n_database="proservice";
        $n_username="root";
        $n_userpass="Code1997Soft";
        $db = mysqli_connect($n_server,$n_username,$n_userpass,$n_database) or die ("Error al conectar con el servidor");

        if (!$db) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        return 11;


        $servername = "143.198.165.60";
        $database = "proservice";
        $username = "root";
        $password = "Code1997Soft";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else

        echo "Connected successfully";
        mysqli_close($conn);

        return 1;


        return DB::connection('mamore')->table('apoyo')->get();
        return 1;
    }
    public function store(Request $request)
    {
        return $request;
    }
}
