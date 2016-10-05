<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    protected $escaping = [];

    /**
     * @return array
     */
    public function escapeInput()
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