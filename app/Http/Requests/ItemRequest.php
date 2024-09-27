<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     
    public function rules(): array
    {
        return [
            'item.name' => 'required|string|max:100',
            'item.stock' => 'required|numeric|max:500',
            'item.expiration_date' => 'required|date',
            'item.memo' => 'nullable|string|max:1000',
        ];
    }
}
