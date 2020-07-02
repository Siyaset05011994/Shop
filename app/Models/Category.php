<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    public $timestamps=false;

    protected $guarded=[];

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function parameters(){
        return $this->belongsToMany(Parameter::class,'category_parameter');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function scopeWithStatusFind($query,$status,$id){
        return $query->where('status',$status)->where('id',$id)->first();
    }

}
