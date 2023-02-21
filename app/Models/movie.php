<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
	public $timestamps=false;
    use HasFactory;
    public function category()
    {
    	return $this->belongsTo(category::class,'category_id');
    }
    public function genre()
    {
    	return $this->belongsTo(genre::class,'genre_id');
    }
    public function category1()
    {
        return $this->hasMany(category::class,'category_id');
    }
    public function genre1()
    {
        return $this->hasMany(genre::class,'genre_id');
    }
    public function movie_genre()
    {
        return $this->belongsToMany(genre::class,'movie_genre','movie_id','genre_id');
    }
    public function episode()
    {
       return $this->hasMany(episode::class);
    }
}
