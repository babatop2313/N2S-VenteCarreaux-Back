<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrelages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('user_id')->unsigned();
            $table->integer('qte');
            $table->integer('prix');
            $table->text('description');
            $table->string('status');
            $table->string('categorie');
            $table->unsignedBigInteger('dep_id')->nullable();
            $table->enum('visibilite', ['public','prive'])->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
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
        Schema::dropIfExists('carrelages');
    }
};
