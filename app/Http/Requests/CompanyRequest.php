<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                            'company_name' => 'required',
                            'company_model' => 'required',
                            'email' => 'required|email|unique:companies',
                            'password' => 'required',
                            'tax_code' => 'required',
                            'phone' => 'required | min:10 ',
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'name' => 'required',
                            'company_name' => 'required',
                            'company_model' => 'required',
                            'email' => 'required|email|unique:companies,email,' . $id . ',id',
                            'password' => 'required',
                            'tax_code' => 'required',
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
            'company_model.required' => 'Bắt Buộc Phải Nhập Company model',
            'email.required' => 'Bắt Buộc Phải Nhập Email',
            'email.unique' => 'Email Đã Tồn Tại',
            'company_name.required' => 'Bắt Buộc Phải Nhập Tên Công Ty',
            'company_name.unique' => 'Tên Công Ty Đã Tồn Tại',
            'tax_code.required' => 'Bắt Buộc Phải Nhập Code',
        ];
    }
}
