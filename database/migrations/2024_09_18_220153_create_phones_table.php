<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            
            // campo unsignedBigInteger para tener un numero muy grande para la base de datos
            // este campo es una foreign key que se refiere a la tabla users
            // onDelete('cascade') si se elimina un usuario automáticamente se eliminan sus phones
            // onUpdate('cascade') si se actualiza un usuario automáticamente se actualizan sus phones
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

            // otra manera de hacerlo
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
