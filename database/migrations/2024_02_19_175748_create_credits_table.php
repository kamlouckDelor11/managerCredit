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
        Schema::create('credits', function (Blueprint $table) {
            $table->string('token',100)->unique();
            $table->string('token_branch',100);
            $table->string('token_user',100);
            $table->string('custumerName');
            $table->string('custumerActivity');
            $table->string('custumerPhoneNumber');
            $table->string('custumerNui');
            $table->string('custumerSex');
            $table->string('custumerDomicile') /**localisation domicile */;
            $table->string('custumerLocalActivity') /**localisation actiité */;
            $table->string('nature');
            $table->string('amount');
            $table->string('amountValidated')->nullable();
            $table->string('amountRemboursement')->nullable();
            $table->string('numberFolder')->nullable();
            $table->string('deadline');
            $table->string('deadlineValidated')->nullable();
            $table->string('status')->nullable();
            $table->string('etat')->nullable();
            $table->string('path'); /**dossier etude */
            $table->string('path2')->nullable(); /**dossier deblocage */
            $table->date('create_at');
            $table->date('update_at')->nullable();
            $table->date('firstRemboursementDate')->nullable();
            $table->date('lastRemboursementDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
