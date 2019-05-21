<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public function category()
    {
        return $this->belongsToMany('App\Category', 'store_to_store_categories', 'store_id', 'store_category_id');
    }
}
