<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterValue extends Model
{
    protected $table='parameter_value';

    protected $guarded=[];

    public $timestamps=false;

    public function parameter(){
        return $this->belongsTo(Parameter::class);
    }

//    public function parameter_values_names(){
//        return $this->belongsTo(Parameter::class);
//    }

}
