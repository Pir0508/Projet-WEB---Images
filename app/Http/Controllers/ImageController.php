<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use DB;
use Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $filter = null)
    {
      if($filter->filtre != null){
        $req = $filter->filtre;
        switch($req){
          case 'asc' :
            $params = "created_at";
            break;
          case 'desc' :
            $params = "created_at";
            break;
          case 'nom' :
            $req = "asc";
            $params = "nom";
            break;
        }
        if(auth()->user()->admin == 1){
          $images = Image::orderBy($params, $req)->get();
        }else{
          $images = Image::where('public', 1)->orderBy($params, $req)->get();
        }
        return view('user.showAll', compact('images'));
      }
      if(auth()->user()->admin == 1){
        $images = Image::all();
      }else{
        $images = Image::where('public', 1)->get();
      }
      return view('user.showAll', compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name_picture = str_slug($request->input('title')).'.'.$request->file('image')->getClientOriginalExtension();
        $name = str_slug($request->input('title'));

        if($request->input('public') != null){
            $public = 1;
        }else{
          $public = 0;
        }
        try{
            DB::beginTransaction();
            $image = Image::create(array_merge($request->all(), ['user_id' => Auth::user()->id, 'nom' => $name_picture, 'fullname' => $name, 'public'=>$public]));
        } catch (Exception $e) {
            DB::rollback();
            return redirect(route('image.create'));
        }
        DB::commit();

        // Enregistrer fichier
        $request->file('image')->move('img/'.Auth::user()->id, $name_picture);
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $filtre = "images."+$id;
      if(auth()->user()->admin == 1){
        $images = Image::all()->orderby(filtre);
      }else{
        $images = Image::where('public', 1)->get()->orderby(filtre);
      }
      return $images;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      dd($request);
      $name_picture = str_slug($request->input('title')).'.'.$request->file('image')->getClientOriginalExtension();
      $name = str_slug($request->input('title'));
      if($request->input('public') != null){
          $public = 1;
      }else{
        $public = 0;
      }
      try{
          DB::beginTransaction();
          $image = Image::create(array_merge($request->all(), ['user_id' => Auth::user()->id, 'nom' => $name_picture, 'fullname' => $name, 'public'=>$public]));
      } catch (Exception $e) {
          DB::rollback();
          return redirect(route('image.create'));
      }
      DB::commit();

      // Enregistrer fichier
      $request->file('image')->move('img/'.Auth::user()->id, $name_picture);
      return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
      unlink(public_path('img\\'.$image->user_id.'\\'.$image->nom));
      $image->delete();
      return redirect(route('home'));
    }
}
