Un app web de gestion de pret de bibliothèques:
    - Enregistrement et gestion de livres
    - Enregistrement de nouveau adhérents
    - Suivie des prêt, des retours des livres par les dérent et getion des penalités
    - Facilité des recherches


Dev Fonctionnalitées:
    - Renregistrement des livres:
        Table livres : Titre, auteur, catégories, ISBN(Insternational Standard Book Number)(Unique),
                        Date d'enregistrement, status (0-1)
        Formulaire : ISBN , Titre, Auteur, catégories

    - Gestion des adhérents: num_adhérent, nom, adresse, mail, date d'admission, validité, statatus (0-1)
        Contraintes : $num_adhérent : année-date-heure-minutes-seconde
        Formulaire : nom, adresse, mail, validité

    - Prêt de livres : ISBN, num_adhérent, date d'emprunt, date d'écheance, retourné (0-1), date de retour
        contraintes : retourné : default 0, date de retour : nullable
        Formulaire : ISBN, num_adhérent, date d'écheance

    - Gestion de penalités : ISBN, num_adhérent, pernalité (nullable)
                            retard -> date d'echance + date de retoutour (interdiction d'enprunt)
                            perte -> prix d'achat actuel du livre
                            fonction de convetion monétaire euro-> ar

    - Rappel de retour : à partir de 2jrs avant écheance et proche de l'écheances
                        mail (date limite + penalité)
    - Recherches des livres : faire des recherches sur comment établir une fonctionnalité de recherches.

    - Statistiques : Livres(titre,catégories livres), Adhérent (nombre d'emprunt) par mois

BDD conception :
    Description : mis en place d'une application de gestion de prêt de livre dans une bibliothèques
    Tâches : Enregistrement de nouveau adhérents
             Enregistrement de nouveau livres
             Enregistrement des prêt de livres
             Enregistrement des retour de livres emprunté par les adhérents
             Gestion de penalités en cas de retard ou de perder du livre emprunté par l'adhérend
             Possibilité d'obtenir une statistiques des livres les plus populaire et des adérents les plus actifs

Idée de fonctionnalité supp:
Questions : Possible utiliser api ?
- Liste des personnes qui a déjà umprunter le livre
    Home page :

    - Voir les livres les plus populaires
    - Voir les avis sur l'ouvrages à la une
    - Voir les nouveau livres
    - Calendrier ou on peut voir le jour d'empruntet la date limite
    - Generation de citations cotidienne d'écrivins
    - Voir une partie de pages de livres populaires  (ouvrages à la une) :
        - Choix de livre aleatoire en fonction des livres dans la bibliothèques