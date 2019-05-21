<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'store_categories';

    public function stores()
    {
        return $this->belongsToMany('App\Store', 'store_to_store_categories', 'store_category_id', 'store_id');
    }

}
