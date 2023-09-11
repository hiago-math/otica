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
        Schema::create('complemento_enderecos', function (Blueprint $table) {
            $table->uuid('complemento_endereco_uid')->primary();
            $table->string('numero')->nullable()->index();
            $table->string('complemento')->nullable()->index();

            $table->foreignUuid('cliente_uid')->constrained('clientes', 'cliente_uid');

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
        Schema::dropIfExists('complemento_enderecos');
    }
};
