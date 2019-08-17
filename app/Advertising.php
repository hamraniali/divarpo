<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
      'category_id','user_id','name','description','images','price','city','active'
    ];

    public function scopeActive($query)
    {
        return $query->where('active' , 1);
    }

    public function scopeSearch($query , $inputs)
    {
        if (isset($inputs['search']) && !empty($inputs['search'])) {
            $query->where('name' , 'LIKE' , '%'.$inputs['search'].'%');
        }
        if (isset($inputs['city']) && !empty($inputs['city'])) {
            $query->where('city' , $inputs['city']);
        }
        if (isset($inputs['category']) && !empty($inputs['category'])) {

            $query->where('category_id' , $inputs['category']);
        }
        $query->where('active' , 1);

    }
}
