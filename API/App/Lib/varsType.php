<?php

class Adherent {

    public string $nom;
    public string $prenom;
    public string $mail;
    public string $adresse;
    public int $abonement;
    public string $type_compte;
    public string $date_admission;
    public string $password;

    public function __construct(string $nom, string $prenom, string $mail, string $adresse, int $abonement, string $date_admission, string $password, string $compte = 'ADR')
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

    public string $img;
    public string $titre;
    public string $auteur;
    public string $publication_date;
    public string $description;
    public string $categorie;
    public string $maison;
    public string $isbn;
    public int $quantite;
    public string $note;

    public function __construct(
        string $img, string $titre, string $auteur, string $publication_date, 
        string $description, string $categorie, string $maison, string $isbn, int $quantite, string $note
        )
    {
        $this->img = $img;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->publication_date = $publication_date;
        $this->description = $description;
        $this->categorie = $categorie;
        $this->maison = $maison;
        $this->isbn = $isbn;
        $this->quantite = $quantite; 
        $this->note = $note;
    }
}

class Emprunt {
    public int $id_adherent;
    public int $num_exemplaire;
    public string $date_emprunt;
    public string $date_echeance;

    public function __construct(int $id_adherent, int $num_exemplaire, string $date_emprunt, string $date_echeance)
    {
        $this->id_adherent = $id_adherent;
        $this->num_exemplaire = $num_exemplaire;
        $this->date_emprunt = $date_emprunt;
        $this->date_echeance = $date_echeance;
    }
}