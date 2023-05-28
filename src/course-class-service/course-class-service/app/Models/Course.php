<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

		protected $table = 'course';

		protected $fillable =[
			'study_program',
			'code',
			'name',
			'course_credit',
			'lab_credit',
			'type',
			'short_description',
			'minimal_requirement',
			'study_material_summary',
			'learning_media'
		];

		public function creator()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

		public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function courseClasses(){
        return $this->hasMany(CourseClass::class);
    }

    public function syllabuses()
    {
        return $this->hasMany(Syllabus::class);
    }
}
