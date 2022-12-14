<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        // để lấy phương thức hiện tại
        switch ($this->method()):
            case 'POST':
                $id = $this->route()->id;
                switch ($currentAction) {
                    case 'saveFeedback':
                        $rules = [
                            'candidate_id'=>'unique:feedback',
                            'title' => 'required',
                            'satisfied' => 'required',
                            'unsatisfied' => 'required',
                            'like_text' => 'required',
                            'improve' => 'required',
                            'rate'=>'required',
                        ];
                        break;
                    default:
                        break;
                }
                break;

            default:
                break;
        endswitch;
        return $rules;
    }

    public function messages()
    {
        return [
            'candidate_id.unique'=>'Bạn đã feedback đến công ty',
            'title.required' => 'Chưa nhập tiêu đề',
            'satisfied.required' => 'Chưa nhập điều hài lòng',
            'unsatisfied.required' => 'Chưa nhập điều chưa hài lòng',
            'like_text.required' => 'Chưa nhập điều bạn thích',
            'improve.required' => 'Chưa nhập điều cần cải thiện',
        ];
    }
}