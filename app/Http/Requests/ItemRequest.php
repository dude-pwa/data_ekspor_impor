<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemRequest extends Request
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return[];
                }
            case 'POST':
                {
                    return[
                        'hsxcode' => 'required|unique:items|min:10|max:10',
                        'desc' => 'required',
                        'sitc8code' => 'required|unique:items|min:8|max:8'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return[
                        'hsxcode' => 'required|min:10|max:10',
                        'desc' => 'required',
                        'sitc8code' => 'required|min:8|max:8'
                    ];
                }
            default:break;
        }
    }
}
