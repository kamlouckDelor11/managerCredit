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
        Schema::create('upaids', function (Blueprint $table) {
            $table->string('token',100)->unique();
            $table->string('token_credit');
            $table->string('token_branch');
            $table->string('numberFolder');
            $table->string('upaidAmount');
            $table->string('upaidProof');
            $table->string('upaidRecovery')->nullable();
            $table->integer('satatus')->default(0) /** 0 impayé non soldé et 1 si déjà soldé */;
            $table->date('upaidDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upaids');
    }
};
