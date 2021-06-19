<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateTranslationRequest
 * @package App\Http\Requests\Admin
 */
class UpdateTranslationRequest extends FormRequest
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
        ];
    }
}
