<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // id do produto
            $table->id();
            // nome
            $table->string("name", 255);
            // descrição
            $table->text("description");
            //path da imagem
            $table->string('imagem', 255);
            // preço
            $table->decimal('price', 8, 2);
            // para saber momento em que o produto foi criado e editado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
