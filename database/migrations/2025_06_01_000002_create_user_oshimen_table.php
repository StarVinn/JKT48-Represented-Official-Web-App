<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOshimenTable extends Migration
{
    public function up()
    {
        Schema::create('user_oshimen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'member_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_oshimen');
    }
}
