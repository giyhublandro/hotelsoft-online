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
        Schema::create('utilisateur_acces_profils', function (Blueprint $table) {
            $table->increments('ID_UTILISATEUR_ACCESS_PROFIL');
            $table->string('CODE_PROFIL');
            $table->string('CODE_UTILISATEUR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur_acces_profils');
    }
};
