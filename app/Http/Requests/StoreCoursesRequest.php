<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoursesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//       // return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:category,id',
            'status' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'photo' => 'nullable',
            'youtubelink'=> 'nullable'
        ];
    }
}
