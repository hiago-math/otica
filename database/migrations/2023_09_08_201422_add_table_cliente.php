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
        Schema::create('clientes', function (Blueprint $table) {
            $table->uuid('cliente_uid')->primary();
            $table->string('nome_completo')->nullable(false)->index();
            $table->string('cpf')->unique()->nullable(false)->index();
            $table->string('nome_mae')->nullable(false)->index();
            $table->date('data_nascimento')->nullable(false)->index();
            $table->integer('idade')->nullable()->index();
            $table->string('convenio')->nullable()->index();
            $table->string('profissao')->nullable()->index();
            $table->date('ultima_consulta')->nullable()->index();
            $table->string('numero_celular')->nullable()->index();
            $table->string('numero_residencia')->nullable()->index();

            $table->foreignUuid('sexo_uid')->constrained('sexos', 'sexo_uid');
            $table->foreignUuid('endereco_uid')->constrained('enderecos', 'endereco_uid');

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
