<?php

namespace App\Http\Controllers;
use App\Cargo;
use App\Departamento;
use App\Http\Requests\UpdatePassRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Nacionalidad;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Caffeinated\Shinobi\Models\Role;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PerfilController extends Controller
{
    public function index(Request $request)
    {

            $user= User::join('cargos','users.codcargo','=','cargos.id')
            ->join('nacionalidads','users.codnacionalidad','=','nacionalidads.id')
            ->join('departamentos','users.coddpto','=','departamentos.id')
            ->select('users.id','users.nombre','users.apellido','nacionalidads.abreviado as nacionalidad','users.cedula','cargos.nombre as cargo','departamentos.nombre as dpto','users.direccion','users.telefono',
            'users.email','users.usuario','users.password',
            'users.condicion')
            ->where('users.id','=', 'auth()->user()->id' )
            ->orderBy('users.id','desc')
            ->groupBy('users.id','users.nombre','users.apellido',
            'users.cedula','cargos.nombre','departamentos.nombre','users.direccion','users.telefono',
            'users.email','users.usuario','users.password',
            'users.condicion');

            $users = User::get();
            $roles = Role::get();

            return view('perfil.index',compact('user','roles','users'));
    }
    public function show($id)
    {
       $users= User::join('cargos','users.codcargo','=','cargos.id')
            ->join('nacionalidads','users.codnacionalidad','=','nacionalidads.id')
            ->join('departamentos','users.coddpto','=','departamentos.id')
            ->select('users.id','users.nombre','users.apellido','nacionalidads.abreviado as nacionalidad','users.cedula','cargos.nombre as cargo','departamentos.nombre as dpto','users.direccion','users.telefono',
            'users.email','users.usuario','users.password',
            'users.condicion')
            ->where('users.id','=',$id)
            ->orderBy('users.id','desc')
            ->groupBy('users.id','users.nombre','users.apellido',
            'users.cedula','cargos.nombre','departamentos.nombre','users.direccion','users.telefono',
            'users.email','users.usuario','users.password',
            'users.condicion');
        return view('perfil.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        $nacionalidad = Nacionalidad::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $dpto = Departamento::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $cargo = Cargo::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        return view('user.create', compact('roles','nacionalidad','dpto','cargo'),[
            'user' => new User
        ]);
    }


    public function store(Request $request,User $user)
    {
        $message = request()->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'codnacionalidad' => 'required',
            'coddpto' => 'required',
            'codcargo' => 'required',
            'cedula' => 'required|max:20|unique:users',
            'direccion' => 'required|max:70',
            'telefono' => 'required|max:20',
            'email' => 'required|max:50|unique:users|email',
            'usuario' => 'required|unique:users',
            'password' => 'required|max:100',
            'telefono' => 'required|max:100',
        ]);

        $user = User::create($request->all());
        $user->roles()->sync($request->get('roles','user'));
        return Redirect::to("user");
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        $nacionalidad = Nacionalidad::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $dpto = Departamento::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $cargo = Cargo::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        return view('user.edit', compact('user','roles','nacionalidad','dpto','cargo', $user->id));
    }

    public function update(UpdatePassRequest $request,User $user)
    {

        $user->update($request->all());
        $user->save();
        return redirect()->route('user.index')
            ->with('success', 'Usuario actualizado con éxito.');
    }


    public function destroy(Request $request)
    {
        $user= User::findOrFail($request->id_usuario);
        if($user->condicion=="1"){
            $user->condicion= '0';
            $user->save();
            return Redirect::to("user");
        }else{
            $user->condicion= '1';
            $user->save();
            return Redirect::to("user");
        }
    }
}
