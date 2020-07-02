<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Rules\CheckParameterExistsOrNot;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ParameterInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:parameters',
            'label'=>'required|unique:parameters',
            'type'=>[
                'required',
                Rule::in(config('app.aviable_parameter_types')) // Rule Validation class'idir . in metodu ise verilen field'in array'in icinde olmasina mecbur edir. eks halda sehv cixarir
            ],
        ];
    }

}
