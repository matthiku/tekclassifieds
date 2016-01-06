<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classified extends Model
{
    // default table name....
    protected $table = 'classifieds';

    protected $fillable = ['title', 'category_id', 'description', 'price', 'main_image', 'condition', 'location', 'email', 'phone'];

    protected $hidden   = [];



    public function category() {
        return $this->belongsTo('App\Category');
    }
}
