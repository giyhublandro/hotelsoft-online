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
        Schema::create('utilisateur_caisses', function (Blueprint $table) {
            $table->increments('ID_UTILISATEUR_CAISSE');
            $table->string('CODE_UTILISATEUR');
            $table->string('CODE_CAISSE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur_caisses');
    }
};
