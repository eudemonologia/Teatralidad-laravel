<?php

namespace App\Http\Controllers;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params =  request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
        ]);

        if (request('fnacimiento') != null) {
            $params['fnacimiento'] = request()->validate([
                'fnacimiento' => 'date',
            ])['fnacimiento'];
        } else {
            $params['fnacimiento'] = null;
        }

        if ($request->hasFile('avatar')) {
            $file = request()->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ])['avatar'];
            $name = time() . $params['name'] . '-' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/avatars/', $name);
            $params['avatar'] = $name;
        } else {
            $params['avatar'] = null;
        }

        $user = DB::table('users')->insert([
            'name' => $params['name'],
            'lastname' => $params['lastname'],
            'email' => $params['email'],
            'password' => md5($params['password']),
            'fnacimiento' => $params['fnacimiento'],
            'avatar' => $params['avatar'],
        ]);

        return Redirect::to('/')->with('message', 'Usuario registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('user', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('edit-user', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (session('user') && session('user')->id == $id) {
            $user = DB::table('users')->where('id', $id)->first();

            $params =  request()->validate([
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'repassword' => 'required|same:password',
                'fnacimiento' => 'date',
            ]);

            $params['id'] = $id;

            if ($request->hasFile('avatar')) {
                $file = request()->validate([
                    'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ])['avatar'];
                $name = time() . $params['name'] . '-' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/images/avatars/', $name);
                $params['avatar'] = $name;
                //Delete old avatar
                if ($user->avatar != null) {
                    unlink(public_path() . '/images/avatars/' . $user->avatar);
                }
            } else {
                $params['avatar'] = $user->avatar;
            }

            $user = DB::table('users')->where('id', $id)->update([
                'name' => $params['name'],
                'lastname' => $params['lastname'],
                'email' => $params['email'],
                'password' => md5($params['password']),
                'fnacimiento' => $params['fnacimiento'],
                'avatar' => $params['avatar'],
            ]);

            return Redirect::to('/user/' . $id)->with('message', 'Usuario actualizado correctamente');
        } else {
            return redirect('/')->withErrors('No tienes permisos para editar este usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (session('user') && session('user')->id == $id) {

            //Destroy the session 
            session()->forget('user');

            //Delete the user avatar
            $user = DB::table('users')->where('id', $id)->first();
            if ($user->avatar != null) {
                unlink(public_path() . '/images/avatars/' . $user->avatar);
            }

            //Delete the user
            DB::table('users')->where('id', $id)->delete();

            return Redirect::to('/');
        } else {
            return Redirect::to('/')->withErrors(['message' => 'No tienes permisos para eliminar este usuario.']);
        }
    }

    public function login()
    {
        $crendentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('email', $crendentials['email'])->where('password', md5($crendentials['password']))->first();

        session()->put('user', $user);

        //login with credentials and save user in session
        if ($user) {
            return Redirect::to(url()->previous());
        } else {
            return Redirect::back()->withErrors(['message' => 'Email o contraseña incorrectas.']);
        }
    }

    public function logout()
    {
        if (session()->has('user')) {
            session()->forget('user');
            return Redirect::to('/')->with('message', 'Sesión cerrada correctamente');
        } else {
            return Redirect::back()->withErrors(['message' => 'No te encuentras logueado.']);
        }
    }
}
