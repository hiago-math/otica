<?php

use Database\Seeders\Migrations\SexosSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
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
        Schema::create('sexos', function (Blueprint $table) {
            $table->uuid('sexo_uid')->primary();
            $table->string('nome')->nullable()->index();
            $table->string('nome_exibicao')->unique()->nullable(false)->index();

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate();
        });

        Artisan::call('db:seed', [
            '--class' => SexosSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexos');
    }
};
