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
                            'phone' => 'required|max:10|unique:candidates,phone,' . $id . ',id',
                            'address' => 'required',
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
            'name.required' => __('messages.name.required'),
            'email.required' => __('messages.email.required'),
            'email.email' => __('messages.email.email'),
            'email.unique' => __('messages.email.unique'),
            'password.required' => __('messages.password.required'),
            'phone.required' => __('messages.phone.required'),
            'phone.max' => 'Số điện thoại nhỏ hơn 10 số!',
            'phone.digits' => 'Sai định dạng số điện thoại!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
        ];
    }
}
