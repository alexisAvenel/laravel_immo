<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Property;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alexis Avenel',
            'email' => 'alexis@gmail.com',
            'password' => bcrypt('azerty'),
        ]);

        Option::create(['name' => 'Parking privé']);
        Option::create(['name' => 'Ascenseur']);
        Option::create(['name' => 'Garage']);
        Option::create(['name' => 'Isolé']);
        Option::create(['name' => 'Jardin']);
        Option::create(['name' => 'Piscine']);

        Property::create([
            'title' => 'Appartement F3 à vendre 3 pièces - 61,60 m2',
            'description' => "
            EN BREF : Vous recherchez l'appartement idéal pour vous installer, pour investir dans du locatif, ou pour loger vos enfants étudiants ?
            Alors laissez-vous tenter par la visite de ce beau T3 prêt à vous accueillir, situé dans une résidence calme, à taille humaine, entourée de verdure et à proximité des transports, écoles et universités.
            Que des atouts !
            Il est composé d'une entrée fonctionnelle avec placards desservant une cuisine aménagée et équipée pour mitonner vos petits plats et un agréable séjour parqueté et baigné de lumière grâce aux grandes baies vitrées donnant accès à un balcon offrant une vue dégagée, idéal pour se détendre au soleil.
            On ne peut que s'y sentir bien !
            Côté nuit, vous disposez de 2 belles chambres et d'une salle de douche.
            Vous n'avez besoin que d'une seule chambre ? L'une des 2 chambres étant séparée du séjour par 2 portes atelier, vous pouvez aisément l'utiliser pour agrandir encore votre séjour.
            Des atouts supplémentaires ? Une cave pour stocker tout votre petit bazar, un garage pour que votre voiture dorme au chaud, et, pour votre confort, des huisseries en double vitrage et des volets électriques.
            Cet appartement est parfait que ce soit pour une personne seule ou un couple désireux de vivre dans un environnement agréable tout en bénéficiant des avantages de la ville, ou pour un investisseur vue sa situation idéale, à 2 pas de Mont Saint Aignan.

            PLUS EN DETAILS : Ce beau T3 est situé dans une résidence sécurisée à taille humaine, alliant le calme et la verdure, avec la proximité des transports et des écoles.
            En effet, via le réseau Astuce, vous aurez un accès rapide sur Rouen grâce au TEOR T2, et sur Mont Saint Aignan avec la ligne F8. Vous pourrez aussi utiliser la gare SNCF de Maromme, à 10 minutes à pied, qui vous permettra de rejoindre Rouen en 5 minutes.
            Pour vos enfants, ils seront accueillis aux écoles Charles Perrault et Léon Blum ou au collège Jules Verne, tous situés à moins de 5 minutes à pied, sans parler de l'accès rapide à l'université. Que rêver de mieux !
            Les charges de copropriété intègrent le chauffage (avec décomptants individuels), l'eau froide et l'entretien des parties communes et espaces verts.
            Vous pourrez également profiter des nombreuses activités sportives et culturelles proposées par la ville, avec notamment une salle de sport à proximité immédiate.
            N'attendez plus ! VENEZ VITE LE VISITER, VOUS SEREZ CONQUIS !!!!
            ",
            'address' => '5 Allée des frères Monet',
            'city' => 'Déville-lès-Rouen',
            'zip' => 76250,
            'area' => 61.60,
            'pieces' => 3,
            'rooms' => 2,
            'stage' => null,
            'price' => 109500,
            'sold' => false,
        ])->each(function ($property) {
            $optionIds = Option::all(['id'])->pluck('id')->toArray();
            shuffle($optionIds);
            $property->options()->attach(array_slice($optionIds, 0, 3));
        });
    }
}
