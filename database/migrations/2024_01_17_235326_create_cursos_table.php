<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->text('descripcion');
            $table->string('nivel_curso',50);
            $table->string('duracion',50);
            $table->double('precio');
            $table->string('imagen_curso',100);
            //asignando una foranea de proveedor
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->unsignedBigInteger('id_instructor');
            $table->foreign('id_instructor')->references('id')->on('instructores');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
