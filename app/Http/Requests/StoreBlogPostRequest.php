<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
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

    /**
     * @return array
     */
    public function formatInput()
    {
        $data = $this->all();

        $formatData = array();
        foreach ($data as $key => $item) {
            $formatData[$key] =
                (in_array($key, $this->escaping)) ?
                    htmlspecialchars($item, ENT_QUOTES, 'UTF-8', false) :
                    $item;
        }

        return $formatData;
    }
}
