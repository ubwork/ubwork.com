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
                    case 'update':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:candidates,email,' . $id . ',id',
                            'phone' => 'required|min:10|unique:candidates,phone,' . $id . ',id',
                            'password' => 'required|min:8',
                            'age' => 'required',
                            'country' => 'required',
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

    public function message()
    {
        return [
            'name.required' => 'Chưa nhập tên',
            'email.required' => 'Chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'email.eamil' => 'Email chưa đúng định dạng',
            'phone.required' => 'Chưa nhập số diện thoại',
            'phone.phone' => 'Chưa đúng định dạng',
            'password.require' => 'Chưa nhập mật khẩu',
            'password.min:8' => 'Mật khẩu phải hơn 8 chữ số',
            'age.require' => 'Chưa nhập tuổi',
            'country.require' => 'Chưa nhập quê quán',
        ];
    }
}
