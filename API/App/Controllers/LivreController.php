<?php

function ajouterLivre() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = [];
        $data = json_decode(file_get_contents('php://input'), true);

        // $data = [
        //     'livre' => [
        //         'titre' => 'The Little Prince',
        //         'auteur' => 'Antoine de Saint-Exupery',
        //         'categorie' => 'Fiction',
        //         'date_edition' => '1971',
        //         'maison_edition' => 'Harcourt',
        //         'isbn' => '978-0-15-601219-5',
        //         'quantite' => 1
        //     ],
        //     'staff' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTEsImFib25lbWVudCI6MTIsImFkbWlzc2lvbiI6IjIwMjMtMDgtMDkiLCJ0eXBlX2NvbXB0ZSI6IkFETSJ9.Rcaqs5jDujKMEg9YgiBMdbO2F0NXvnEpltEy8cf0GDY'
        // ];

        $satff = decodeToken($data['staff']);

        if (!$satff->id || !$satff->type_compte) {
            return ['message' => 'Données du personnel manquantes'];
        }

        if ($satff->type_compte !== 'ADM' || !verifieStaff($satff->id, $satff->type_compte)) {
            return ['message' => 'Personnel inexistant ou non autorisé'];
        }

        $maisonEditionRepositoy = new MaisonEditionRepositoy();
        $maisonEditionRepositoy->connection = new DatabaseConnection;

        if (!$maisonEditionRepositoy->verifieHouse($data['livre']['maison_edition'])) {
            if (!$maisonEditionRepositoy->create($data['livre']['maison_edition'])) {
                return ["message" => "Maison d'édition non enregistrée"];
            }
        }
        $id_maison = $maisonEditionRepositoy->getID($data['livre']['maison_edition']);

        $auteurRepository = new AuteurRepository();
        $auteurRepository->connection = new DatabaseConnection;

        if (!$auteurRepository->verifieAutor($data['livre']['auteur'])) {
            if (!$auteurRepository->create($data['livre']['auteur'])) {
                return ['message' => 'Auteur non enregistré'];
            }
        }
        $id_auteur = $auteurRepository->getID($data['livre']['auteur']);

        $livreRepository = new LivreRepository();
        $livreRepository->connection = new DatabaseConnection;

        if (!$livreRepository->verifieLivre($data['livre']['isbn'])) {

            $livre = new Livre(
                $data['livre']['isbn'],
                $data['livre']['titre'],
                $id_maison,
                $data['livre']['categorie'],
                $data['livre']['quantite'],
                $data['livre']['date_edition']
            );

            if (!$livreRepository->create($livre)) {

                return ['message' => 'Livre non enregistré'];

            }
        }

        $exemplaireRepository = new ExemplaireRepository();
        $exemplaireRepository->connection = new DatabaseConnection;

        if (!$exemplaireRepository->verifieExemplaire($data['livre']['isbn'])) {
            if (!$exemplaireRepository->create($data['livre']['isbn'], date('Y-m-d'))) {
                return ['message' => 'Exemplaire non enregistré'];
            }
            return 'hay';
        } else {
            if (!$livreRepository->updateLivre($data['livre']['quantite'], $data['livre']['isbn'])) {
                return ["message" => "Échec de la mise à jour de l'exemplaire"];
            }   else {
                return ["message" => $data['livre']['titre']." a été mis à jour"];
            }
        }

        $ouvrageRepository = new OuvrageRepository();
        $ouvrageRepository->connection = new DatabaseConnection;

        if (!$ouvrageRepository->verifieOuvrage($data['livre']['isbn'])) {
            if (!$ouvrageRepository->create($data['livre']['isbn'], $id_auteur)) {
                return ['message' => 'Ouvrage non enregistré'];
            }
        }

        return ["message" => $data['livre']['titre'] . " Enregistré avec succès"];

    }

    return ["message" => "Mauvaise requête"];
}

function LivreInfos() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = [];
        // $data = json_decode(file_get_contents('php://input'), true);

        $data = [
                'livre' => [
                    'titre' => 'The Little Prince',
                    'auteur' => 'Antoine de Saint-Exupery',
                    'categorie' => 'Fiction',
                    'date_edition' => '1971',
                    'maison_edition' => 'Harcourt',
                    'isbn' => '978-0-15-601219-5',
                    'quantite' => 1
                ],
                'staff' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTEsImFib25lbWVudCI6MTIsImFkbWlzc2lvbiI6IjIwMjMtMDgtMDkiLCJ0eXBlX2NvbXB0ZSI6IkFETSJ9.Rcaqs5jDujKMEg9YgiBMdbO2F0NXvnEpltEy8cf0GDY'
            ];

    }

    return ["message" => "Mauvaise requête"];

}