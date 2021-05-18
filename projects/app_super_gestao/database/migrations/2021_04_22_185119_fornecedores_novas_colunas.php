<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('fornecedores', function (Blueprint $table) {
          //Adiciona colunas
          $table->string('uf', 100);
          $table->string('nome', 100);
          $table->string('email', 150);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('fornecedores', function (Blueprint $table) {
          //Remove colunas
          $table->dropColumn('uf', 'email');
      });
    }
}
