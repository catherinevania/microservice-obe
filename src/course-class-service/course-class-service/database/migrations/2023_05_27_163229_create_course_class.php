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
		Schema::create('course_classes', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('course_id');
			$table->foreign('course_id')->references('id')->on('course')->onDelete('cascade');
			$table->string('name');
			$table->string('thumbnail_img');
			$table->string('class_code');
			$table->unsignedBigInteger('creator_user_id');
			$table->foreign('creator_user_id')->references('id')->on('user')->onDelete('cascade');
			$table->timestamps();
			$table->unsignedBigInteger('syllabus_id');
			$table->foreign('syllabus_id')->references('id')->on('syllabus')->onDelete('cascade');
		});
	}
	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::create('course_classes', function (Blueprint $table) {
			$table->dropForeign('course_id');
			$table->dropForeign('creator_user_id');
			$table->dropForeign('syllabus_id');

			$table->dropColumn('course_id');
			$table->dropColumn('creator_user_id');
			$table->dropColumn('syllabus_id');

			Schema::dropIfExists('course_classes');
		});
	}
};
