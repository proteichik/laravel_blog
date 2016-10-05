<?php

namespace App\Http\Requests;


class StoreBlogPostRequest extends BaseFormRequest
{
    protected $escaping = [
        'title',
        'description',
    ];

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
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
        ];
    }
}
