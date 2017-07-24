<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\User;
use App\Aluno;
use App\Matraprov;
use App\Bolsa;
use Request;

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

    public function cad_mat(){

      return view('telas.cadmat');

    }
    public function adiciona_m(){

      $params = Request::all();
      $resposta = new Matraprov($params);
      $resposta->save();

      return redirect ()-> action('AdminController@list_u');
    }

    public function list_a(){

      $resposta = Admin::all();
      return view('telas.listadmin')-> with('resposta', $resposta);

      return view('listauser')-> with('resposta', $resposta);
    }


        public function tadmin($id){

          //$params = User::where('id',$id)->first();

          $params = User::find($id);
          echo $params->name;
          if(empty($params)) {

            return "Esse Aluno não existe";

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
//Funções para Alunos

public function list_al(){

  $resposta = Aluno::all();
  return view('telas.listaalunos')-> with('resposta', $resposta);
}

public function cad_al(){
  return view('telas.cad_aluno');
}


public function adiciona_al(){

  $params = Request::all();
  $resposta = new Aluno($params);
  $resposta->save();

  return redirect ()-> action('AdminController@list_a') ->withInput(Request::only('nome'));
}

public function remove($id){

  $resposta = Aluno::find($id);
  $resposta->delete();

  return redirect ()-> action('AdminController@list_a');
}

public function edit_al($id){

  $resposta = Aluno::find($id);
  if(empty($resposta)) {
    return "Esse Aluno não existe";
  }
  return view('telas.edita')->with('r', $resposta);
  //var_dump($resposta);
}

public function editado_al($id){
  $params = $request->all();
  $produto = Aluno:: findOrFail($id);
  $produto->fill($params)->save();

  return redirect ()-> action('AdminController@list_a') ->withInput(Request::only('nome'));
}

          //$resposta = new Admin(array($params->name,$params->email, $params->password));
          //$resposta->save();
          //var_dump($params);
          //return redirect ()-> action('AdminController@list_u');
          //var_dump($resposta)
        /*
        public function tadmin_u($id , Request $request){
          $params = $request->all()
        }
    /*
    public function tadmin($id){

      $params = User::find($id);

      $resposta = new Admin($params);
      $resposta->save();
      return redirect ()-> action('AdminController@list_u');

    }*/


}
