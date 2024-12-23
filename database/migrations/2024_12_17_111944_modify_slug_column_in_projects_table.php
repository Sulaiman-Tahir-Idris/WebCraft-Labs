<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySlugColumnInProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });
    }
}
