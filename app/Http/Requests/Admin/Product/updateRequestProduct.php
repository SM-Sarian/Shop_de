<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class updateRequestProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'title_de' => ['required'],
            'title_en' => ['required'],
            'body' => ['required'],
            'price' => ['required'],
            'brand' => ['required'],
            'guarantee' => ['required'],
            'option' => ['required'],
        ];
    }
}
