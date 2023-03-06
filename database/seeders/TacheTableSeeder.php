<?php

namespace Database\Seeders;

use App\Models\Tache;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TacheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // run est une méthide qui se déclanche lors de l'exécution de la commande db:seed ;
    // un seeder est une classe qui permet le remplissage de votre base de données avec des information soit fictive ou réel .. pour le develeppoment (periode de test )
    public function run()
    {
        //la function run est responsable via le code suivant de crées 10 instance de la classe Tache (model... App\Tache)
        //on utilisant la méthode factory fournie par laravel  ...  responsable de generer les informations nécessaire

        //factory(App\Models\Tache::class , 10)->create();
        Tache::factory()
            ->count(10)
            ->create();
//        factory(App\Tache::class, 10)->create();
    }
}
