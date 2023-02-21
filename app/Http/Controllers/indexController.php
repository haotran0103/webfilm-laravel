<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\genre;
use App\Models\movie;
use App\Models\episode;
use App\Models\movie_genre;
class indexController extends Controller
{
    public function home()
    {
        $category= category::orderBy('id','DESC')->get();
        $genre= genre::orderBy('id','DESC')->get();
        $newMovie=movie::with('category','genre')->orderBy('ngayCapNhat','DESC')->take(6)->get();
        $allMovie=  DB::table('movies')
                    ->join('categories', 'movies.category_id', '=', 'categories.id')
                    ->where('categories.title', '=', 'movie')
                    ->select('movies.title','movies.description','movies.status','movies.image','movies.slug')
                    ->get(); 
        $phimbo=DB::table('movies')
                    ->join('categories', 'movies.category_id', '=', 'categories.id')
                    ->where('categories.title', '=', 'phim bộ')
                    ->select('movies.title','movies.description','movies.status','movies.image','movies.slug')
                    ->get(); 
        $anime=DB::table('movies')
                    ->join('categories', 'movies.category_id', '=', 'categories.id')
                    ->where('categories.title', '=', 'anime')
                    ->select('movies.title','movies.description','movies.status','movies.image','movies.slug')
                    ->get(); 
        $ngay=movie::with('category','genre')->where('topViews',0)->take(5)->get();
        $tuan=movie::with('category','genre')->where('topViews',1)->take(5)->get();
        $thang=movie::with('category','genre')->where('topViews',2)->take(5)->get();
        $nam=movie::with('category','genre')->where('topViews',3)->take(5)->get();
    	return view('pages.home',compact('category','genre','newMovie','allMovie','phimbo','anime','ngay','tuan','thang','nam'));
    }
    public function catological()
    {
        $category= category::orderBy('id','DESC')->get();
        $genre= genre::orderBy('id','DESC')->get();

       
        $movie=movie::orderBy('ngayCapNhat','DESC')->get();
    	return view('pages.catological',compact('category','genre','movie'));
    }
    public function catological2($slug)
    {
        $category= category::orderBy('id','DESC')->get();
        $genre_slug= genre::where('slug',$slug)->first();
        $genre= genre::orderBy('id','DESC')->get();
        $movie_genre=movie_genre::where('genre_id',$genre_slug->id)->get();
        $many_genre=[];
        foreach ($movie_genre as $key => $value) {
            $many_genre[]=$value->movie_id;
        }
        $movies=movie::whereIn('id',$many_genre)->orderBy('ngayCapNhat','DESC')->get();

    	return view('pages.catological2',compact('category','genre','genre_slug','movies'));
    }
    public function detail($slug)
    {
        $movie_slug= movie::with('category','genre','movie_genre')->where('slug',$slug)->where('status',1)->first();
        $relate=movie::with('category','genre')->where('category_id',$movie_slug->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->take(6)->get();
        $first_episode=episode::where('movie_id',$movie_slug->id)->orderBy('episode','ASC')->first();
         $curr_ep=episode::where('movie_id',$movie_slug->id)->orderBy('episode','DESC')->first();
    	return view('pages.detail',compact('movie_slug','relate','first_episode','curr_ep'));
    }
    public function watch($slug,$tap)
    {
       
       
        $movie_slug= movie::with('category','genre','movie_genre','episode')->where('slug',$slug)->where('status',1)->first();
        $relate=movie::with('category','genre')->where('category_id',$movie_slug->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->take(6)->get();
        if(isset($tap)){
            $tap_phim=$tap;
            $tap_phim=substr($tap, 4,1);
            $episode_select=episode::where('movie_id',$movie_slug->id)->where('episode',$tap_phim)->first();
        }else{
            $tap_phim=1;
        }
        $curr_ep=episode::where('movie_id',$movie_slug->id)->orderBy('episode','DESC')->first();
    	return view('pages.watch',compact('movie_slug','relate','episode_select','curr_ep'));
    }
    // public function episode()
    // {
    // 	return view('pages.episode');
    // }
    public function timkiem()
    {
        if(isset($_GET['search'])){
        $search=$_GET['search'];
        $category= category::orderBy('id','DESC')->get();
        $genre= genre::orderBy('id','DESC')->get();
        $movies = movie::with('category','genre','episode')->where('title','like','%' .$search.'%')->get();

        return view('pages.timkiem',compact('category','genre','movies','search'));
        }else{
            return redirect()->to('/');
        }
        
    }
}
