<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsoptionsTable extends Migration
{
    public function up()
    {
        Schema::create('questionsoptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('option_text');
            $table->boolean('correct')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}