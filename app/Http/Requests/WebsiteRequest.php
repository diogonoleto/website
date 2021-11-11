<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteRequest extends FormRequest
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
        $id = 'NULL';
        if($this->segment(2)){
            $id = $this->segment(2);
        }
        return [
            "url" => "required|url|unique:websites,url,{$id},id,deleted_at,NULL",
        ];
    }
}
