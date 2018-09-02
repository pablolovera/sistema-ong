<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTable extends Migration {

	public function up()
	{
		Schema::create('file', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->morphs('feature');
            $table->string('name')->nullable();
            $table->string('original_name')->nullable();
            $table->string('description')->nullable();
            $table->string('extension')->nullable();
            $table->string('size')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('path')->nullable();
            $table->binary('base_64')->nullable();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('file');
	}
}