<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCvRequest extends FormRequest
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
                    
                    case 'saveInfo':
                        $rules = [
                            'name' => 'required',
                            'phone' => 'required',
                            'email' => 'required',
                            'description' => 'required',
                            'candidate_id' => 'required',
                        ];
                        break;

                    case 'updateInfo':
                        $rules = [
                            'name' => 'required',
                            'phone' => 'required',
                            'email' => 'required',
                            'description' => 'required',
                            'candidate_id' => 'required',
                        ];
                        break;

                    case 'saveExperience':
                        $rules = [
                            'company_name' => 'required',
                            'position' => 'required',
                            'start_date' => 'required',
                            'end_date' => 'required',
                            'description' => 'required',
                        ];
                        break;

                    case 'updateExperience':
                        $rules = [
                            'company_name' => 'required',
                            'position' => 'required',
                            'start_date' => 'required',
                            'end_date' => 'required',
                            'description' => 'required',
                        ];
                        break;

                    case 'saveSkills':
                        $rules = [
                            'skill_id' => 'required',
                        ];
                        break;

                    case 'saveEducation':
                        $rules = [
                            'name_education' => 'required',
                            'majors' => 'required',
                            'start_date' => 'required',
                            'end_date' => 'required',
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

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'company_name.required' => 'Vui lòng nhập tên công ty!',
            'name_education.required' => 'Vui lòng nhập tên trường!',
            'majors.required' => 'Vui lòng nhập ngành học!',
            'position.required' => 'Vui lòng nhập vị trí!',
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu!',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'email.required' => 'Vui lòng nhập email!',
            'description.required' => 'Vui lòng nhập mô tả!',
            'skill_id.required' => 'Vui lòng chọn kỹ năng!',
        ];
    }
}
