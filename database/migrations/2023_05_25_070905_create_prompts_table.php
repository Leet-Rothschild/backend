<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromptsTable extends Migration
{
    public function up()
    {
        Schema::create('prompts', function (Blueprint $table) {
            $table->id('prompt_id');
            $table->string('text');
            $table->string('result');
            $table->string('tools_type');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prompts');
    }
}
