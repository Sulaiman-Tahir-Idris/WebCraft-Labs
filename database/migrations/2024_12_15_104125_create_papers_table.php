<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('abstract');
            $table->text('content'); // Ensure content column is added
            $table->string('author');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('papers');
    }
}
