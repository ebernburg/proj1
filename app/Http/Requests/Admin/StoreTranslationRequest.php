<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreTranslationRequest
 * @package App\Http\Requests\Admin
 */
class StoreTranslationRequest extends FormRequest
{
    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        return [
            'key' => [
                'required',
            ],
            'locale' => [
                'required',
            ],
        ];
    }
}
