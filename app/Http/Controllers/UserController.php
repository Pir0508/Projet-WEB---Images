<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Image;
use Storage;
use App;
use Redirect;
use Lang;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::findOrFail(Auth::user()->id);
      $images = Image::where('user_id', Auth::user()->id)->get();
      return view('index', compact('images', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = new User();
      $user->email = $request->input('email');
      $user->name = $request->input('name');
      $user->admin = 0;
      $user->profil_picture="";
      $user->password = Hash::make($request->input('password'));
      $user->save();

      return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $users = User::all();
      return view('user.edit', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.gestion', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $user = User::findOrFail($id);
      if($request->hasFile('profil_picture')){
        $name_avatar = $id.".".$request->file('profil_picture')->getClientOriginalExtension();
        $user->update([
          'profil_picture'=>$name_avatar,
        ]);
        $request->file('profil_picture')->move('img/avatar/', $name_avatar);

        return redirect(route('home', $user));
      }
      if ($request->has('password')) {
        dd("nok");
          $user->update([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'password' => bcrypt($request->input('password'))
          ]);
      } else {
          $user->update([
              'name' => $request->input('name'),
              'profil_picture' => $request->input('profil_picture'),
              'email' => $request->input('email'),
          ]);
      }
      return redirect(route('home', $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $id = $user->id;
      Storage::disk('images')->deleteDirectory($id);
      $user->delete();
      $images = Image::where('user_id', $id)->delete();
      return redirect(route('user.show',Auth::user()->id));
    }

    public function changeLang(Request $req){
      if($req->lang != null){
        App::setlocale($req->lang);
        return Redirect::back();
      }
    }
}
