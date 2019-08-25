<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
      'category_id','user_id','name','description','images','price','city_id','district_id','active', 'status'
    ];

    protected $casts = [
      'images' => 'array'
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
        if (isset($inputs['distric']) && !empty($inputs['distric'])) {
            $district = District::where('name' , $inputs['distric'])->first();
            $query->where('district_id' , $district->id);
        }
        if (isset($inputs['category']) && !empty($inputs['category'])) {

            $query->where('category_id' , $inputs['category']);
        }
        if (isset($inputs['filter']) && !empty($inputs['filter'])) {
            switch ($inputs['filter']) {
                case "newest":
                    $query->latest();
                    break;
                case "oldest":
                    $query->oldest();
                    break;
            }
        }
        if (isset($inputs['pic']) && !empty($inputs['pic'])) {
            $query->where('images' , '!=' , '[]');
        }
        $query->where('active' , 1);

    }
}
