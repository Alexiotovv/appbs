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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 9)->nullable()->default('');
            $table->string('nombres', 200)->nullable()->default('');
            $table->string('ape_paterno', 200)->nullable()->default('');
            $table->string('ape_materno', 200)->nullable()->default('');
            $table->string('sexo', 1)->nullable()->default('');
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('modalidad', 50)->nullable()->default('');
            $table->string('lugar_trabajo', 200)->nullable()->default('');
            $table->string('ocupacion', 200)->nullable()->default('');
            $table->boolean('estado')->nullable()->default(true);
            $table->bigInteger('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('trabajadores');
    }
};
