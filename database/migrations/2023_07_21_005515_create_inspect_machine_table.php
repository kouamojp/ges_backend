<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspect_machine', function (Blueprint $table) {
           $table->unsignedBigInteger('inspecteur_id');
           $table->foreign('inspecteur_id')->references('id')->on('inspecteurs')->onDelete('cascade')->nullable();
           $table->unsignedBigInteger('machine_id');
           $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->nullable();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspect_machine');
    }
}
