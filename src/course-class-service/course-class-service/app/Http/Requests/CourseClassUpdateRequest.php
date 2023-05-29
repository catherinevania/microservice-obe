<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseClassUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if ($method == 'PATCH') {
            return [
                'course_id' => ['sometimes', 'integer'],
                'student_user_id' => ['sometimes', 'integer'],
                'name' => ['sometimes', 'string'],
                'thumbnail_img' => ['sometimes', 'string'],
                'class_code' => ['sometimes', 'string'],
                'syllabus_id' => ['sometimes', 'integer']
        ];
         } else {
            return [
                'course_id' => ['sometimes', 'integer'],
                'student_user_id' => ['sometimes', 'integer'],
                'name' => ['sometimes', 'string'],
                'thumbnail_img' => ['sometimes', 'string'],
                'class_code' => ['sometimes', 'string'],
                'syllabus_id' => ['sometimes', 'integer']
        ];
    }
    }
}
