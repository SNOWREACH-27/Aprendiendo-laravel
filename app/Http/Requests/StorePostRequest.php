<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    //  se usa para saber si el usuario tiene permisos para realizar la petición
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:100',
            'body' => 'required'
        ];
    }
    // public function messages(): array
    // {   
    // //    el :attribute es el nombre del atributo
    //     return [
    //         'title.required' => 'El campo :attribute es obligatorio.',
    //         'title.min' => 'El campo :attribute debe tener al menos :min caracteres.',
    //         'title.max' => 'El campo :attribute debe tener como máximo :max caracteres.',
    //         'body.required' => 'El campo :attribute es obligatorio.',
    //     ];
    // }
    // // para cambiar el nombre de los atributos, el nombre del campo a uno personalizado
    // public function attributes(): array
    // {
    //     return [
    //         'title' => 'título del post',
    //         'body' => 'cuerpo del post'
    //     ];
    // }
    

    // // para obtener todos los datos de la petición
    // public function all($keys = null)
    // {
    //     return parent::all($keys);
    // }
    
    // // para obtener solo los campos que se pasan como parámetro
    // public function only($keys)
    // {
    //     return parent::only($keys);
    // }
    
    // // para obtener todos los campos excepto los que se pasan como parámetro
    // public function except($keys)
    // {
    //     return parent::except($keys);
    // }
    
    // // para obtener el valor de un campo
    // public function input($key = null, $default = null)
    // {
    //     return parent::input($key, $default);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve null
    // public function input($key = null)
    // {
    //     return parent::input($key);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve el valor por defecto
    // public function input($key = null, $default = null)
    // {
    //     return parent::input($key, $default);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve el valor por defecto
    // public function post($key = null, $default = null)
    // {
    //     return parent::post($key, $default);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve null
    // public function post($key = null)
    // {
    //     return parent::post($key);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve el valor por defecto
    // public function query($key = null, $default = null)
    // {
    //     return parent::query($key, $default);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve null
    // public function query($key = null)
    // {
    //     return parent::query($key);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve el valor por defecto
    // public function server($key = null, $default = null)
    // {
    //     return parent::server($key, $default);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve null
    // public function server($key = null)
    // {
    //     return parent::server($key);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve el valor por defecto
    // public function session($key = null, $default = null)
    // {
    //     return parent::session($key, $default);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve null
    // public function session($key = null)
    // {
    //     return parent::session($key);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve el valor por defecto
    // public function file($key = null, $default = null)
    // {
    //     return parent::file($key, $default);
    // }
    
    // // para obtener el valor de un campo, si no existe devuelve null
    // public function file($key = null)
    // {
    //     return parent::file($key);
    // }
}
