<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\episode;
use Carbon\Carbon;
class episodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_ep=episode::with('movie')->orderBy('movie_id','DESC')->get();
        return view('admincp.episode.index',compact('list_ep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie=movie::orderBy('id','DESC')->pluck('title','id');
        return view('admincp.episode.form',compact('list_movie'));
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
        $ep=new episode();
        $ep->movie_id=$data['movie_id'];
        $ep->link=$data['link'];
        $ep->episode=$data['episode'];
        $ep->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $ep->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        return redirect()->back();
    }
    public function select_movie($value='')
    {
        $id=$_GET['id'];
        $movie=movie::find($id);
        $output='<option>---chọn tập phim---</option>';
        for($i=1;$i<=$movie->sotap;$i++){
            $output.='<option value="'.$i.'">tập '.$i.'</option>';
        }
        echo $output;
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
       $episode=episode::find($id);
       $list_movie=movie::orderBy('id','DESC')->pluck('title','id');
        return view('admincp.episode.form',compact('episode','list_movie'));
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
        $ep=episode::find($id);
        $ep->movie_id=$data['movie_id'];
        $ep->link=$data['link'];
        $ep->episode=$data['episode'];
        $ep->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $ep->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        return redirect()->to('episode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode=episode::find($id)->delete();
        return redirect()->back();
    }
}
