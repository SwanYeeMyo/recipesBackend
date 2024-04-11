<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'author_note' => ['string', 'nullable'],
            'kitchen_note' => ['string', 'nullable'],
            'cook_time' => ['required','integer'],
            'prep_time' => ['required', 'integer'],
            'serving' => ['required', 'integer'],
            'dish_type' => ['required', 'array'],
            'dish_type.*' => ['exists:dish_types,id'], // Ensure each ID exists in the dish_types table
            'user_id' => ['required', 'integer'],
            'images.*' => ['required','image', 'mimes:jpeg,png,jpg,gif','max:2048'],
            'ingredients' => ['required', 'array'],
            'ingredients.*' => ['required'],
            'steps' => ['required', 'array'],
            'steps.*' => ['required', 'string'],
            'type' => ['required', 'string'],
        ];
    }
}
