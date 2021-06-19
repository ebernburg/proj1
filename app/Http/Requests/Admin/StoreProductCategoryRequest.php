<?php

namespace App\Http\Requests\Admin;

use App\Models\ProductCategory;
use App\Models\ServiceCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StoreProductCategoryRequest extends FormRequest
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
        $trans = [];
        foreach (LaravelLocalization::getSupportedLocales() as $key=>$language) {
            $trans[$key.'.title'] = ['required'];
            $trans[$key.'.description'] = ['max:65534'];
        }
        $default = [
            'sort' => ['integer'],
            //'slug' => ['string'],
        ];

        return array_merge($trans,$default);
    }
}
