<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryInsertRequest extends FormRequest
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
            'name'=>[
                'required',
                Rule::unique('categories')->where(function ($query) { //ad ve parent_id birge unique olsun, yeni eyni parentin childleri eyni adda ola bilmez
                    return $query->where('name', request()->name)->where('parent_id',request()->parent_id);
                })
            ],
            'parent_id'=>['nullable','exists:categories,id,status,1'],
            'parameter_exists'=>[
                'nullable',
                Rule::in([0,1])
            ],
        ];
    }
}
