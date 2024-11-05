<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'location', 'type_id', 'category_id', 'user_id'];

    public function categories(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function user_details(){
        return $this->hasOne(UserDetail::class, 'id', 'user_id');
    }
    public function watchlist(){
        return $this->hasMany(Watchlist::class, '', '');
    }
}
