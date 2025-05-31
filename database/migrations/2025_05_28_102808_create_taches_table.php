<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('taches', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('evenement_id');
        $table->string('description');
        $table->boolean('statut')->default(false);
        $table->timestamps();

        $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
