<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        switch($this->method()):
            case 'POST':
                switch($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:customers',
                            'password' => 'required',
                            'phone' => 'required|numeric|unique:customers|digits:10',
                            'image' => 'image|mimes:jpg,png,jpeg|max:5000'
                        ];
                        break;

                        case 'update':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:customers',
                            'password' => 'required',
                            'phone' => 'required|numeric|unique:customers|digits:10'
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

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Sai định dạng email!',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu! ',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.numeric' => 'Số điện thoại phải là số!',
            'phone.digits' => 'Sai định dạng số điện thoại!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
            'image.image' => 'File nhập lên phải là Ảnh!',
            'image.mimes' => 'Ảnh phải thuộc định dạng jpg, png, jpeg!',
            'image.max' => 'Ảnh nhập không quá 5mb!',
        ];
    }
}
