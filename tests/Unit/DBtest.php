<?php


use Tests\TestCase;

class DBtest extends TestCase
{

    public function createApplication() {
        // creation d'une instance de l'application appelé avant chaque test via laravel
// Utilisation de l'environnement de test
        //putenv definit la variable d'env db default a sqlite_test... pour determiner quelle DB sera utilisé pour les test ....

        putenv('DB_DEFAULT=sqlite_testing');
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }
    public function setUp() {
        //setUp() : pour effectué les configurations nécessaire avant chaque test ;
        parent::setUp();
        // méthode appelé pour la realisation de MAJ de structure de la BD avant chaque test ;
        \Tests\Feature\Artisan::call('migrate');
// Création des données de tests
        \Tests\Feature\factory(Tache::class)->create(
            [
                'expiration' => "2017-08-31",
                'categorie' => 'Urgent',
                'description' => 'Teste la table tache',
                'accomplie' => 'N',
            ]
        );
        \Tests\Feature\factory(Tache::class, 5)->create(['categorie' => 'Urgent']);
        \Tests\Feature\factory(Tache::class, 5)->create(['categorie' => 'Bidon']);
    }
    public function testModelTest() {
        // on générent 3 instances de la Classe Tache en utilisant la méthode make()
        $taches = \Tests\Feature\factory(Tache::class, 3)->make();
        // methode valide si le nombre est de 3  ;
        $this->assertEquals(count($taches), 3);
    }
    public function testAccesDBTest() {
        // récupération de touts les lignes de la BD et validé s'il sont de nombre 11 ;
        $taches = \Tests\Feature\DB::table('taches')->get();
        $this->assertEquals(count($taches), 11);
    }

    public function testAccesDBWithIDTest() {
        //recupérer la 1er ligne de la table taches ... avec first()
        $tache = \Tests\Feature\DB::table('taches')->where('id', 1)->first();
        //vérification avec assertEquals les champs avec les valeurs Suivants ;
        $this->assertEquals($tache->expiration, '2017-08-31');
        $this->assertEquals($tache->categorie, 'Urgent');
        $this->assertEquals($tache->description, 'Teste la table tache');
        $this->assertEquals($tache->accomplie, 'N');
    }
    public function testUpdateDBWithIDTest() {
        // MAJ la ligne qui posséde ID =1 avec les nouveaux valeurs insérés  via la table
        \Tests\Feature\DB::table('taches')->where('id', 1)->update(
            [
                'categorie' => 'A Faire',
                'description' => 'Teste modif de la table tache',
                'accomplie' => 'O',
            ]
        );
        //récup la ligne MAJ de la table taches a l'aide de first() avec filtration ID= 1 ;
        $tache = \Tests\Feature\DB::table('taches')->where('id', 1)->first();
        // vérifier si les colones $tache -> ... sont bien modifier avec les nouveaux valeurs insérés
        $this->assertEquals($tache->expiration, '2017-08-31');
        $this->assertEquals($tache->categorie, 'A Faire');
        $this->assertEquals($tache->description, 'Teste modif de la table tache');
        $this->assertEquals($tache->accomplie, 'O');
    }



    public function testDeleteDBWithIDTest() {
        //effacé touts les lignes de la table taches ayant un ID sup a 1
        \Tests\Feature\DB::table('taches')->where('id', '>', 1)->delete();
        // récup tout les lignes de la table tache
        $taches = \Tests\Feature\DB::table('taches')->get();
        //vérifier s'il rest qu'un seul ligne  :
        $this->assertEquals(count($taches), 1);
    }


    // la fonction suivant utilisé pour annuler tout les migrations realiser au cour du test de la BD
        public function tearDown() {
        \Tests\Feature\Artisan::call('migrate:reset');
        //pour effectuer le nettoyage et de ferméture necessaire pour terminer le test
        parent::tearDown();
    }

}
