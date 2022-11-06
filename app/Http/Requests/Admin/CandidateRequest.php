<?php

namespace App\Http\Requests\Admin;

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
        $id = $this->route()->id;
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        // để lấy phương thức hiện tại
        switch($this->method()):
            case 'POST':
                switch($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:candidates',
                            'password' => 'required',
                            'phone' => 'required|min:10|unique:candidates|max:10',
                            'image' => 'image|mimes:jpg,png,jpeg|max:5000'
                        ];
                        break;

                        case 'update':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:candidates,email,' . $id . ',id',
                            'phone' => 'required|max:10|unique:candidates,phone,' . $id . ',id',
                            'image' => 'image|mimes:jpg,png,jpeg|max:5000'
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
            'name.required' => __('messages.name.required'),
            'email.required' => __('messages.email.required'),
            'email.email' => __('messages.email.email'),
            'email.unique' => __('messages.email.unique'),
            'password.required' => __('messages.password.required'),
            'phone.required' => __('messages.phone.required'),
            'phone.max' => 'Số điện thoại nhỏ hơn 10 số!',
            'phone.digits' => 'Sai định dạng số điện thoại!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
            'image.image' => __('messages.image.image'),
            'image.mimes' => 'Ảnh phải thuộc định dạng jpg, png, jpeg!',
            'image.max' => 'Ảnh nhập không quá 5mb!',
        ];
    }
}
