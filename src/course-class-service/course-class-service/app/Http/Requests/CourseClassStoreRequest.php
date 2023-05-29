<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseClassStoreRequest extends FormRequest
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
        return [
            'creator_user_id' => ['integer'],
            'course_id' => ['integer'],
			'student_user_id' => ['integer'],
			'name' => ['string'],
            'thumbnail_img' => ['string'],
            'class_code' => ['string'],
            'syllabus_id' => ['integer'],
        ];
    }
}
