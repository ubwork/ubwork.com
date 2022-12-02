<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'avatar' => 'image|mimes:jpg,png,jpeg|max:5000'
                        ];
                        break;

                    case 'update':
                        $rules = [
                            'name' => 'required',
                            'avatar' => 'image|mimes:jpg,png,jpeg|max:5000'
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
            'name.required' => __('messages.name.required'),
            'avatar.image' => __('messages.image.image'),
            'avatar.mimes' => 'Ảnh phải thuộc định dạng jpg, png, jpeg!',
            'avatar.max' => 'Ảnh nhập không quá 5mb!',
        ];
    }
}
