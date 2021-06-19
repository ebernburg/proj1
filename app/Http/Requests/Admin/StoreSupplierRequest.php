<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupplierRequest extends FormRequest
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
           //'image' => ['required','string','max:255'],
//            'slug' => ['string','max:255'],
            'name' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            'email' => ['required','string','max:255'],

//           'status'=> [Rule::in([0,1])],

        ];
    }
}
