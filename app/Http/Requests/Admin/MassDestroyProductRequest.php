<?php


namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProductRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ids'   => 'required', 'array',
            'ids.*' => 'exists:product.js,id',
        ];
    }
}
