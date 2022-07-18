<?php

namespace Database\Seeders;

use App\Models\Bodega;
use App\Models\Dispositivo;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            $bodegas = ['Smartphone', 'Notebook', 'Televisores'];

            foreach ($bodegas as $bodega) {
                Bodega::updateOrCreate([
                    'nombre' => $bodega
                ]);
            }
            
            $marcas = ['ASUS', 'HP', 'XIAOMI', 'SAMSUNG', 'LG'];
            
            foreach ($marcas as $marca) {
                Marca::updateOrCreate([
                    'nombre' => $marca
                ]);
            }

            $models = [
                [
                    'nombre' => 'TUF Gaming FX504',
                    'id_marca' => 1
                ],
                [
                    'nombre' => 'TUF Gaming F15',
                    'id_marca' => 1
                ],
                [
                    'nombre' => 'Redmi Note 4',
                    'id_marca' => 3
                ],
                [
                    'nombre' => 'Pavilon',
                    'id_marca' => 2
                ],
                [
                    'nombre' => 'Galaxy A1',
                    'id_marca' => 4
                ],
                [
                    'nombre' => 'Galaxy S10+',
                    'id_marca' => 4
                ],
                [
                    'nombre' => 'Smart TV 42"',
                    'id_marca' => 5
                ]
            ];

            foreach ($models as $model) {
                Modelo::updateOrCreate($model);
            }

            $dispositivos = [
                [
                    'nombre' => 'Celular black',
                    'id_modelo' => 3,
                    'id_bodega' => 1
                ],
                [
                    'nombre' => 'Notebook red',
                    'id_modelo' => 2,
                    'id_bodega' => 2
                ],
                [
                    'nombre' => 'PC gamer white',
                    'id_modelo' => 1,
                    'id_bodega' => 2
                ],
                [
                    'nombre' => 'Computador green',
                    'id_modelo' => 4,
                    'id_bodega' => 2
                ],
                [
                    'nombre' => 'Televisor',
                    'id_modelo' => 7,
                    'id_bodega' => 3
                ],
                [
                    'nombre' => 'Celular white',
                    'id_modelo' => 6,
                    'id_bodega' => 1
                ],
                [
                    'nombre' => 'Celular red',
                    'id_modelo' => 5,
                    'id_bodega' => 1
                ]
            ];

            foreach ($dispositivos as $dispositivo) {
                Dispositivo::updateOrCreate($dispositivo);
            }

            $this->command->info('Se completó la carga de datos.');

        } catch (\Throwable $err) {
            $this->command->error($err->getMessage());
        }
    }
}
