<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageStoreRequest extends FormRequest
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
        return [
            'Name' => ['required', 'string'],
            'Price' => ['required', 'integer'],
            'Discount' => ['required', 'string'],
            'Deskripsi' => ['required', 'string'],
            'Link' => ['required', 'string'],
            'Image' => ['required', 'string'],
        ];
    }
}
