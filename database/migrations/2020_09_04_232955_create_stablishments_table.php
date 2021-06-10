<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stablishments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del comite vaso de leche
            $table->string('image')->nullable();
            $table->string('location')->nullable(); // Ignoralo
            $table->string('address'); // direccion
            $table->string('mz_lote'); // Manzana/Lote
            $table->string('latitud');
            $table->integer('tipo_sector'); // Rural / Urbano
            $table->string('name_presidenta');
            $table->string('cargo');
            $table->string('num_beneficiado');
            $table->string('num_resolucion');
            $table->date('fecha_emitido');
            $table->date('fecha_vencimiento');
            $table->string('longitud');
            $table->string('phone');
            $table->mediumText('description')->nullable();
            $table->uuid('uuid');
            $table->foreignId('category_id')->constrained(); // lugar(AA.HH Indio)
            $table->foreignId('user_id')->constrained()->nullable();
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
        Schema::dropIfExists('stablishments');
    }
}

