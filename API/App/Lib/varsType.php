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