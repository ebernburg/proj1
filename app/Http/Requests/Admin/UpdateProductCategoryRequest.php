<?php

namespace App\Http\Requests\Admin;
use App\Models\Banner;
use App\Models\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UpdateProductCategoryRequest extends FormRequest
{


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
