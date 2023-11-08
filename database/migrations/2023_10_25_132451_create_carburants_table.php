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
        Schema::create('carburants', function (Blueprint $table) {
            $table->id();
            $table->string("numfactCa")->unique();
            $table->double("nblitre");
            $table->double("montant");
            $table->foreignId("vehicle_id")->constrained();
            $table->foreignId("driver_id")->constrained();
            $table->date("date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carburants');
    }
};
