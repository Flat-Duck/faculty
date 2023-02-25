<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->date('published_at')->nullable();
            $table->string('place')->index();
            $table->bigInteger('member_id')->unsigned()->index();                        
            $table->bigInteger('decision_id')->nullable()->unsigned()->index();    
            $table->timestamps();

            $table->foreign('decision_id')->references('id')->on('decisions');
            $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researches');
    }
}
