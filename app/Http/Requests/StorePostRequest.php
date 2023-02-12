<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:300'],
            'content' => ['string', 'max:1000'],
            'is_public' => ['boolean'],
        ];
    }
}
