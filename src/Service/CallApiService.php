<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

    private $client;

    public function __construct(HttpClientInterface $client){
        $this->client = $client;
    }


    public function getFournisseursData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://localhost:44345/Fournisseurs_',
            ["verify_peer" => false,
            "verify_host" => false ]
        );

        return $response->toArray();
    }

    public function getAdherentsData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://localhost:44345/Adherents_',
            ["verify_peer" => false,
            "verify_host" => false ]
        );

        return $response->toArray();
    }


    public function createAdherent(String $societe,String $civilite,String $nom, String $prenom, String $email, String $date_adhesion,String $actif)
    {
        $response = $this->client->request(
            'POST',
            'https://localhost:44345/Adherents_',
            ['societe' => $societe,
            'civilite' => $civilite,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'date_adhesion' => $date_adhesion,
            'actif' => $actif
            ]
        );
    }

    public function getProduitsData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://localhost:44345/Produits_',
            ["verify_peer" => false,
            "verify_host" => false ]
        );

        return $response->toArray();
    }
}