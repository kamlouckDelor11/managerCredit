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
        Schema::create('cautions', function (Blueprint $table) {
            $table->string('token', 100)->unique();
            $table->string('credit_token', 100);
            $table->string('nomCaution');
            $table->string('ageCaution');
            $table->string('sexeCaution');
            $table->string('lien');
            $table->string('activiteCaution');
            $table->string('localisationCaution');
            $table->string('localisationActivite');
            $table->string('telephoneCaution');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cautions');
    }
};
