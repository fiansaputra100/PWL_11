<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ApiRequest extends FormRequest
{
    use ApiResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     protected function failedValidation(Validator $validator)
     {
        throw new HttpResponseException($this->apiError(
            $validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY,
        ));
     }
    public function authorize():bool
    {
        return false;
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

     protected function failedAuthorization()
     {
        throw new HttpResponseException($this->apiError(
            null,
            Response::HTTP_UNAUTHORIZED
        ));
     }
    public function rules()
    {
        return [
            //
        ];
    }
}
