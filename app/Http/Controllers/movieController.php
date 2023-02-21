<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\category;
use App\Models\genre;
use App\Models\movie_genre;
use Carbon\Carbon;
use Storage;
use File;
class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=movie::with('category','movie_genre')->orderBy('id','DESC')->get();
        // return response()->json($list);
        $path=public_path()."/json_file/";
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }
        file::put($path.'movie.json',json_encode($list));
        return view('admincp.movie.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=category::pluck('title','id');
        $genre=genre::pluck('title','id');
        $list_genre=genre::all();
        return view('admincp.movie.form',compact('category','genre','list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        $movie=new movie();
        $movie->title=$data['title'];
        $movie->trailer=$data['trailer'];
        $movie->resolution=$data['resolution'];
        $movie->thoiLuong=$data['thoiLuong'];
        $movie->phuDe=$data['phuDe'];
        $movie->sotap=$data['sotap'];
        $movie->tags=$data['tags'];
        $movie->description=$data['description'];
        $movie->status=$data['status'];
        $movie->image=$data['image'];
        $movie->category_id=$data['category_id'];
        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id=$gen[0];
        }
        
        $movie->slug=$data['slug'];
        $movie->ngayTao=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngayCapNhat=Carbon::now('Asia/Ho_Chi_Minh');
        $get_image=$request->file('image');

        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));
            $new_image=$name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $movie->image=$new_image;
        }

        $movie->save();
        $movie->movie_genre()->attach($data['genre']);
        return redirect()->back();
    }
    public function update_topviews(Request $request)
    {
        $data=$request->all();
        $movie=movie::find($data['id_film']);
        $movie->topViews=$data['topviews'];

        $movie->save();
    }
    public function update_season(Request $request)
    {
        $data=$request->all();
        $movie=movie::find($data['id_film']);
        $movie->season=$data['season'];
        $movie->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=category::pluck('title','id');
        $genre=genre::pluck('title','id');
        $movie=movie::find($id);
        return view('admincp.movie.form',compact('category','genre','movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=category::pluck('title','id');
        $genre=genre::pluck('title','id');
        $list_genre=genre::all();
        $movie=movie::find($id);
        $movie_genre=$movie->movie_genre;
        return view('admincp.movie.form',compact('category','genre','list_genre','movie','movie_genre'));
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
        $data=$request->all();
        $movie=movie::find($id);

        $movie->title=$data['title'];
        $movie->trailer=$data['trailer'];
        $movie->thoiLuong=$data['thoiLuong'];
        $movie->resolution=$data['resolution'];
        $movie->phuDe=$data['phuDe'];
        $movie->sotap=$data['sotap'];
        $movie->tags=$data['tags'];
        $movie->description=$data['description'];
        $movie->status=$data['status'];
        $movie->ngayCapNhat=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->category_id=$data['category_id'];
        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id=$gen[0];
        }
        $movie->slug=$data['slug'];
        $get_image=$request->file('image');

        if($get_image){
            if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
            }else{
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));
            $new_image=$name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $data->image=$new_image;
        }
    }
        $movie->save();

        $movie->movie_genre()->sync($data['genre']);
        return redirect('movie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=movie::find($id);
        if(!empty($movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        movie_genre::whereIn('movie_id',[$movie->id])->delete();
        $movie->delete();
        return redirect()->back();
    }
}
