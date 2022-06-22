<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.usersIndex')->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'          => ['required', 'string', 'min:3', 'max:20', "unique:users,name"],
            'email'             => ['required', 'email', "unique:users,email"],
            'password'          => ['required', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'confirmed']
        ]);

        if ($validator->fails()) {
            return redirect("/instellingen/gebruikers")->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->updated_at = null;
        $user->save();

        Session::flash('Checkmark','Gebruiker is succesvol aangemaakt');
        return redirect('/instellingen/gebruikers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('Checkmark','Gebruiker is succesvol verwijderd');
        return redirect('/instellingen/gebruikers');
    }
}
