<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImportRequest extends Request
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
                        'date' => 'required',
                        'item_id' => 'required',
                        'country_id' => 'required',
                        'harbor_id' => 'required',
                        'netwt' => 'required',
                        'value' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return[
                        'date' => 'required',
                        'item_id' => 'required',
                        'country_id' => 'required',
                        'harbor_id' => 'required',
                        'netwt' => 'required',
                        'value' => 'required',
                    ];
                }
            default:break;
        }
    }
}
