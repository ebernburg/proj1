<?php

namespace App\Http\Requests\Admin;


use App\Models\ImageCarousel;
use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImageCarouselRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => [Rule::in(array_keys(ImageCarousel::STATUSES))],
            'description' => ['string'],
            'key' => ['required','string'],
            'title' => ['string'],
        ];
    }
}
