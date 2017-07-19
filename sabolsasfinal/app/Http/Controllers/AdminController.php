<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeadmin');

    }

    public function list_u(){

      $resposta = User::all();
      return view('telas.listauser')-> with('resposta', $resposta);
    }

    public function list_a(){

      $resposta = Admin::all();
      return view('telas.listadmin')-> with('resposta', $resposta);
    }


        public function tadmin($id){

          //$params = User::where('id',$id)->first();

          $params = User::find($id);
          echo $params->name;
          if(empty($params)) {
            return "Esse Usuario não existe";
          }
          Admin::create([
              'name' => $params['name'],
              'email' => $params['email'],
              'password' => bcrypt($params['password']),
          ]);

          return redirect ()-> action('AdminController@list_u');;
        }

    public function tuser($id){

      $params = Admin::find($id);
      $params->delete();
      return redirect ()-> action('AdminController@list_u');

    }

}
