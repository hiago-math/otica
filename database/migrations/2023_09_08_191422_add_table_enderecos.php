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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->uuid('endereco_uid')->primary();
            $table->string('cep')->index()->nullable(false);
            $table->string('logradouro')->index()->nullable(false);
            $table->string('complemento')->nullable();
            $table->string('bairro')->index()->nullable(false);
            $table->string('cidade')->index()->nullable(false);
            $table->string('uf')->index()->nullable(false);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
