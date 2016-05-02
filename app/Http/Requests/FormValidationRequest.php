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
            'title' => 'required|between:10,200',
            'background' => 'required|between:100,600',
            'design' => 'required|between:100,600',
            'discussion'  => 'required|between:100,600',
            'findings'  => 'required|between:100,600',
            'abstract'  => 'required|between:100,850',
          ];
    }


    public function messages()
    {
        return [
            'type.required' => 'Select either POSTER or PAPER submission type.',
            'track.required'  => 'Select a track to present your research.',
            'title.required' => 'Provide a title for your research.',
            'background.required' => 'Background is a required field with a minimum of 20 and maximum of 100 words.',
            'design.required' => 'Design is a required field with a minimum of 20 and maximum of 100 words.',
            'discussion.required'  => 'Discussion is a required field with a minimum of 20 and maximum of 100 words.',
            'findings.required'  => 'Findings is a required field with a minimum of 20 and maximum of 100 words..',
            'abstract.required'  => 'Abstract is a required field with a minimum of 20 and maximum of 100 words..'
        ];

    }
}
