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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique()->nullable();
            $table->string('prenom');
            $table->string('nom');
            $table->string('telephone');
            $table->string('image')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('profil', ['admin','superviseur', 'membre'])->nullable();
            $table->boolean('status')->default(false);

            
            $table->unsignedBigInteger('dep_id')->nullable();
            $table->unsignedBigInteger('affectation')->nullable();
            //$table->foreign('dep_id')->references('id')->on('deps')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            //$table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
