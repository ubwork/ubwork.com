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
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required|unique:companies',
                            'company_name' => 'required',
                            'address' => 'required',
                            'district' => 'required',
                            'company_model' => 'required',
                            'working_time' => 'required',
                            'city' => 'required',
                            'country' => 'required',
                            'zipcode' => 'required',
                            'phone' => 'required',
                            'email' => 'required',
                            'company_name' => 'required|email',
                            'password' => 'required',
                            'logo' => 'required',
                            'link_web' => 'required',
                            'coin' => 'required',
                            'tax_code' => 'required',
                        ];
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
            'name.required' => 'Bắt Buộc Phải Nhập Tên Phòng',
            'name.unique' => 'Tên Phòng Đã Tồn Tại',
            'company.required' => 'Bắt Buộc Phải Chọn Loại Phòng',
            'address.required' => 'Bắt Buộc Phải Nhập Giá',
            'district.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'company_model.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'working_time.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'city.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'country.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'zipcode.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'phone.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'email.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'company_name.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'password.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'logo.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'link_web.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'coin.required' => 'Bắt Buộc Phải Nhập Mô Tả',
            'tax_code.required' => 'Bắt Buộc Phải Nhập Mô Tả',
        ];
    }
}
