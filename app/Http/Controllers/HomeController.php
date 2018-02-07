<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginAction()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $correctUsername = env('ADMIN_USERNAME', 'admin');
        $correctPassword = env('ADMIN_PASSWORD', '123456');

        if($username == $correctUsername && $password == $correctPassword)
        {
            $_SESSION['isADMIN'] = true;
            return redirect('/en');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function logoutAction()
    {
        if(isset($_SESSION['isADMIN']))
            $_SESSION['isADMIN'] = false;

        return redirect('/en');
    }
}
