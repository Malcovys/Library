<?php

class Adherent {

    public string $nom;
    public string $prenom;
    public string $mail;
    public string $adresse;
    public string $abonement;
    public string $type_compte;
    public string $date_admission;
    public string $password;

    public function __construct(string $nom, string $prenom, string $mail, string $adresse, string $abonement, string $date_admission, string $password, string $compte = 'ADR')
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->adresse = $adresse;
        $this->abonement = $abonement;
        $this->date_admission = $date_admission;
        $this->password = $password;
        $this->type_compte = $compte;
    }

}

class Livre {

    public string $isbn;
    public string $titre;
    public int $id_maison;
    public string $categorie;
    public int $quantite;
    public string $date_edition;

    public function __construct(string $isbn, string $titre, int $id_maison, string $categorie, int $quantite, string $date_edition)
    {
        $this->isbn = $isbn;
        $this->titre = $titre;
        $this->id_maison = $id_maison;
        $this->categorie = $categorie;
        $this->quantite = $quantite;
        $this->date_edition = $date_edition;
    }
}