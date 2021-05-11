<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          //criando tabela filiais
          Schema::create('filiais', function (Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
          });

          //criando tabela produto_filiais
          Schema::create('produto_filiais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('produto_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();


          //foreign key (constraints)
          $table->foreign('filial_id')->references('id')->on('filiais');
          $table->foreign('produto_id')->references('id')->on('produtos');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::create('filiais', function (Blueprint $table){
        $table->decimal('preco_venda',8,2);
        $table->integer('preco_minimo');
        $table->integer('preco_maximo');
      });

      Schema::dropIfExists('produtos_filiais');
      Schema::dropIfExists('filiais');
    }
}
