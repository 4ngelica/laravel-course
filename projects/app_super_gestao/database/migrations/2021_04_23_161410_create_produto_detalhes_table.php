<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('produto_detalhes', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('produto_id'); //singular do nome da tabela principal + chave primaria
          $table->float('comprimento', 8, 2);
          $table->float('largura', 8, 2);
          $table->float('altura', 8, 2);
          $table->timestamps();

          //constraint de relacionamento (qual coluna vai receber a chave estrangeira)
          $table->foreign('produto_id')->references('id')->on('produtos');
          $table->unique('produto_id'); //garante relacionamento 1:1
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
