<?php

namespace ioc\Http\Requests;

use ioc\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class FormValidationRequest extends Request
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
      return [
          'type' => 'required|in:POSTER,PAPER',
          'track' => 'required|in:leader,health,both',
          'title' => 'required|between:10,300',
          'background' => 'required|between:100,800',
          'design' => 'required|between:100,800',
          'discussion'  => 'required|between:100,800',
          'findings'  => 'required|between:100,800',
          'abstract'  => 'required|between:100,1100',
        ];
    }

}
