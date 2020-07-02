<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table='parameters';

    protected $guarded=[];

    public $timestamps=false;

    public function values(){
        return $this->hasMany(ParameterValue::class);
    }

    public function parameter_values_names(){
        return $this->values()->pluck('value')->toArray();
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_parameter');
    }

    public function scopeWithStatusFind($query,$status,$id){
        return $query->where('status',$status)->where('id',$id)->first();
    }

}
