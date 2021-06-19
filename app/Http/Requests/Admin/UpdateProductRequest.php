<?php

namespace App\Http\Requests\Admin;

use App\Models\Food;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UpdateProductRequest extends FormRequest
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
            $trans[$key.'.content'] = ['max:65534'];
        }
        $default = [
            'status' => [Rule::in(array_keys(Product::STATUSES))],
            'sort' => ['integer'],
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'slug' => ['string'],
            'food_category_id' => ['string'],
            'supplier_id' => ['string'],
        ];

        return array_merge($trans,$default);
    }
}
