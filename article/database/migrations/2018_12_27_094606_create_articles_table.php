<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //번호, 제목, 글쓴이, 날짜, 비밀번호, 본문, 조회수, (카테고리), (추천수), (댓글수), (업로드), (댓글), (대댓글)
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50); 
            $table->string('name', 30);
            $table->string('password', 30);
            $table->text('content');
            $table->integer('count')->default(0); //보통 조회수는 hit으로 표현
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
