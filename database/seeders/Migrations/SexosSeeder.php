<?php

namespace Database\Seeders\Migrations;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SexosSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexos')->insert([
                [
                    'sexo_uid' => Str::uuid(),
                    'nome' => 'masculino',
                    'nome_exibicao' => 'Masculino',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'sexo_uid' => Str::uuid(),
                    'nome' => 'feminino',
                    'nome_exibicao' => 'Feminino',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'sexo_uid' => Str::uuid(),
                    'nome' => 'outros',
                    'nome_exibicao' => 'Outros',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
