<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 12.11.2018
 * Time: 21:01
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return auth()->check();
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
            'username'   =>  ['required', 'string', 'between:1,100'],
            'password'   =>  ['required'],
        ];
    }
}