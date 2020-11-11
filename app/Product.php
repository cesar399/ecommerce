<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Controllers;


class Product extends Model
{
    public function getRouteKeyName()
	{
		return 'id';
	}
	 protected $fillable = [
       'user_id', 'name', 'price', 'description'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()//relacion polimorfica. relacion 1 a muchos
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function scopeName($query, $name){
        if(trim($name)){
            $query->where('name', "LIKE", "%$name%");
        }
    }



}
