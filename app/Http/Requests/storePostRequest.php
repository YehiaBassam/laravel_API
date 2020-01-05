<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePostRequest extends FormRequest
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

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array
    //  */
    public function rules()
    {

        if($this->method()=="PUT")
        {
            $title='required|min:3|unique:posts,title,'.$this->post;
            $description = 'required|min:10';
        }
        else
        {
            $title='required|min:3|unique:posts';
            $description = 'required|min:10';
        }
        return [
            'title' => $title,
            'description' => $description,
        ];
    }
}
