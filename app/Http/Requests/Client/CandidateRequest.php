<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'email' =>
                            'required|email|unique:candidates,email,' . $id . ',id',
                            'password' => 'required',
                            'phone' => 'required|unique:candidates|min:10|max:10',
                            'link_git' => 'required',
                            'education_levels' => 'required',
                            'languages' => 'required',
                            'description' => 'required',
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
            'name.required' => 'Chưa nhập tên',
            'email.required' => 'Chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'email.eamil' => 'Email chưa đúng định dạng',
            'password.required' => 'Chưa nhập password',
            'phone.required' => 'Chưa nhập phone',
            'link_git.required' => 'Chưa nhập link_git',
            'education_levels.required' => 'Chưa nhập education_level',
            'languages.required' => 'Chưa nhập languages',
            'description.required' => 'Chưa nhập description',
        ];
    }
}
