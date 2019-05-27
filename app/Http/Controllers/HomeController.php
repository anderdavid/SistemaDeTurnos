<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){

        //$request->user()->authorizeRoles(['user', 'admin']);
        //$request->user()->authorizeRoles(['usuario', 'superusuario']);
        return view('home');
    }

    public function createPuntosDeAtencion(Request $request){
        $request->user()->authorizeRoles('SuperAdministrador');
        echo "accesible solo superadministrador";
    }
    public function createOficinistas(Request $request){
         $request->user()->authorizeRoles('Administrador');
          echo "accesible solo administrador";
    }

    public function ambos(Request $request){
        $request->user()->authorizeRoles(['SuperAdministrador', 'Administrador']);
        echo "<h1>funcion accessible por SuperAdministrador y Administrador</h1>";
    }

   /* public function createUsers(Request $request){
        $request->user()->authorizeRoles('admin');
        echo "createUsers accesible solo por admin";
    }
    public function createOficinas(Request $request){
         $request->user()->authorizeRoles('user');
         echo "CreateOficinas accesible solo por users";
    }

    public function ambos(Request $request){
        $request->user()->authorizeRoles(['user', 'admin']);
        echo "<h1>funcion accessible por todos los roles</h1>";
    }*/

     /* SuperAdministrador
       Administrador*/
}
