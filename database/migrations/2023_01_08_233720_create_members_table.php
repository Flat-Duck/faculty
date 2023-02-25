<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('n_id')->nullable();
            $table->date('employment_date')->nullable();
            $table->bigInteger('department_id')->unsigned()->index();
            $table->bigInteger('specialization_id')->unsigned()->index();                        
            $table->enum('degree',[ 'أستاذ','أستاذ مساعد','أستاذ مشارك','محاضر ','محاضر مساعد '])->nullable();
            $table->enum('academic_degree',['ماجستير','دكتوراة'])->nullable();
            $table->date('last_pormotion_date')->nullable();
            $table->date('next_pormotion_date')->nullable();
            $table->text('notes')->nullable();
            $table->string('phone')->nullable();            
            $table->string('email')->nullable();
            $table->string('picture')->nullable();            
            $table->timestamp('is_archived')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnDelete();
            $table->foreign('specialization_id')->references('id')->on('specializations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
