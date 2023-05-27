<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('course', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('study_program_id');
			$table->foreign('study_program_id')->references('id')->on('study_program')->onDelete('cascade');
			$table->unsignedBigInteger('creator_user_id');
			$table->foreign('creator_user_id')->references('id')->on('user')->onDelete('cascade');
			$table->string('name');
			$table->string('code');
			$table->integer('course_credit');
			$table->integer('lab_credit');
			$table->enum('type', ['mandatory', 'elective']);
			$table->string('short_description');
			$table->string('minimal_requirement');
			$table->string('study_material');
			$table->string('learning_media');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::create('course', function (Blueprint $table) {
			$table->dropForeign('study_program_id');
			$table->dropColumn('study_program_id');

			$table->dropForeign('creator_class_id');
			$table->dropColumn('creator_class_id');
		});
	}
};
