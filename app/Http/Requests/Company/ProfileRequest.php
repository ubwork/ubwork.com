<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
                    case 'store':
                        $rules = [
                            'name' => 'required|unique:companies',
                            'company_name' => 'required|unique:companies',
                            'email' => 'required|email|unique:companies',
                            'phone' => 'required | min:10 ',
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'name' => 'required',
                            'company_name' => 'required',
                            'email' => 'required|email|unique:companies,email,' . $id . ',id',
                            'phone' => 'required | min:10 ',
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
            'name.required' => 'Bắt Buộc Phải Nhập Tên',
            'name.unique' => 'Tên Đã Tồn Tại',
            'company_name.required' => 'Bắt Buộc Phải Nhập Tên Công Ty',
            'email.required' => 'Bắt Buộc Phải Nhập Email',
            'email.unique' => 'Email Đã Tồn Tại',
            'phone.required' => 'Bắt Buộc Phải Nhập Số Điện Thoại',
            'phone.min' => 'Số Điện Thoại Tối Thiểu 10 Số',
        ];
    }
}
