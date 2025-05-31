<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tache;
use App\Models\Client;
use App\Models\Evenement;
use App\Models\Prestataire;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     *Seed the application's database.
     */
    
    public function run(): void
    {
        // Ghadi ncreiw 20 prestataires
        Prestataire::factory(20)->create();

        // Ghadi ncreiw 50 clients
        Client::factory(50)->create();

        // Ghadi ncreiw 40 evenements (kol wahed mli9i m3a prestataire random)
        Evenement::factory(40)->create();

        // Ghadi ncreiw 100 reservations (kol reservation mli9a m3a client w evenement random)
        Reservation::factory(100)->create();

        // Ghadi ncreiw 150 taches (kol tache mli9a m3a evenement random)
        Tache::factory(150)->create();
    }

}