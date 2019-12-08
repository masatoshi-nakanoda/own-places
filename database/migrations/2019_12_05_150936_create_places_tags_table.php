<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('place_id')->unsigned()->index(); //plade_id追加
            $table->integer('tag_id')->unsigned()->index(); //tag_idを追加
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            
            // 重複確認
            $table->unique(['place_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places_tags');
    }
}
