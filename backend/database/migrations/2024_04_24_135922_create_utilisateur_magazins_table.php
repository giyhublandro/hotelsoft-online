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
        Schema::create('utilisateur_magazins', function (Blueprint $table) {
            $table->increments('ID_UTILISATEUR_MAGASIN');
            $table->string('CODE_UTILISATEUR');
            $table->string('CODE_MAGAZIN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur_magazins');
    }
};
