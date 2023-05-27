<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
					'name' => $this->name,
					'course_id' => $this->course_id,
					'syllabus_id' => $this->syllabus_id,
					'course_credit' => $this->course_credit,
					'thumbnail_img' => $this->thumbnail_img
				];
    }
}
