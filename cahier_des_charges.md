# [Présentation du projet](https://github.com/Un3x/ensiie-project/blob/master/document/Presentation.md)

## Requirements

- Une authentification
- Un compte administrateur donnant les droits à certaines fonctionnalités (au choix)
- Un profil utilisateur éditable
- Une base de données relationnelle :
    + au moins 3 tables
    + au moins une table de jointure ( n…n)
    + au moins une jointure dans une requête
    + des INSERT, DELETE, UPDATE, SELECT
    + Un CRUD (Create Read Update Delete)
- Du javascript (au minimum validation JS des formulaires). Nous attendons de la part des élèves une véritable appropriation du sujet. Il ne suffira pas de remplir des cases à cocher pour avoir la moyenne, nous voulons voir une démarche d’ingénieur, pas d’exécutant.

## Les technologies

__PHP 7.0__
__PostgreSQL__
__JavaScript__

#### On aimera

Toutes les bonnes pratiques citées sur http://www.phptherightway.com/
PHP 7.1+
Les tests automatisés (unitaires, fonctionnels, de sécurité, de performance, …)
Une API REST bien faite
Les animations CSS parcimonieuses qui profitent à l’UX

#### On n’aimera pas

Les framework
Le XML
jQuery utilisé n’importe comment
HTML5 utilisé n’importe comment

## Notre cahier des charges: 
### Yassir CHEKOUR, MEAS Victor, SKUTNIK Jean-Baptiste, TRACHINO Hugo

L'objectif de notre projet est de réaliser le "Site les Bons Bails", un site permettant aux élèves de l'ENSIIE de s'échanger des projets/corrigés/TP au moyen de trocs, de paiement ou de manière pro-bono. Un internaute doté d'un compte utilisateur peut poser une annonce d'offre ou de demande, ou se contenter d'explorer celles qui existent déjà sur des pages organisées selon les semestres, les modules et les types (exercices, corrigés, TP, Projets, TD, Partiel, etc.).

Le site sera segmenté en 4 pages, dont 1 de login et 3 pour Annoncer un offre, annoncer une demande, ou naviguer les annonces existantes. (+ Toute page de visionnage utilisateur)

### I Login

La première page sera celle du login, et necessitera les fonctionnalités suivantes:
- Capable de creer un compte necessitant: une addresse webmail ensiie (confirmation?), un nom d'utilisateur, un mot de passe, infos de contact pour echages, (photo?)
- Des input pour pouvoir se connecter avec authentification
- Capacité de se login sur un compte administrateur (capacité de modérer les annonces et comptes utilisateurs)
- Des informations générales sur le site, ses objectifs

### II Browse

Après le login, la page vers laquelle l'utilisateur devra etre renvoyé automatiquement sera celle du browse. Cette page a pour but de proposer, par le biais d'onglets les differentes actions que peut réaliser l'internaute tel que: Annoncer un offre, annoncer une demande, visualiser un compte, modifier son compte.  
En dessous de ces onglets se trouve automatiquement les onglets de Semestre, qui permettront à l'internaute de se positionner dans l'environnement des annonces (ce dernier est par defaut sur le S1, les onglets allant de gauche vers droite S1,S2,S3,...). En cliquant sur un semestre, des tables de modules paraissent, avec les annonces d'offres et de demande séparées en deux catégories.

Exemple:

```
Vitera Y

Deconnecter  Modifier compte  Mes Annonces
_________________________________________________________________________________________________________________________________________________________________
| Annoncer un offre | Annoncer une demande | Chercher compte: taper nom ici .................. |
_________________________________________________________________________________________________________________________________________________________________

S1  (sélectionné)|         S2        |        S3         |           S4         |         S5           | etc.
_________________________________________________________________________________________________________________________________________________________________
 _____________________________________           ___________________________________
|              OSS      [x] Suivre    |         |                 C     [] Suivre   |           
|_____________________________________|         |___________________________________|           filtrer:
|  Demande:              Offre:       |         |  Demande:              Offre:     |           [x] Corrigés
|                                     |         |                                   |           []  TP
|                                     |         |                                   |           []  Projet
|                                     |         |                                   |           []  etc.
|                                     |         |                                   |    
|                                     |         |                                   |    
|                                     |         |                                   |    
|                                     |         |                                   |    
```

Elle devra donc compoter:

- Affichage du nom d'utilisateur
- Capacité de modifier ses infos comptes: mdp, username, (photo?), infos de contact et de se deconnecter
- Capacité d'acceder à ses annonces, renvoyant vers une page annexe pour modifier les infos et décidé si elle a eu un retour ou non
- Input pour rechercher un autre compte par nom pour relever ses infos, son username, son mail (ouvre une page annexe) 
(et affichera aussi son nombre d'offres sur le site comme une note)
- Boutons annoncer un offre:demande renvoyant vers les pages concernées
- Onglets interactifs S1,S2, S3 filtrant les requetes sur les annonces
- Capacité de filtrer les types d'annonces
- [OPTIONNEL] Capacité de "suivre" un module et avoir des notifications par webmail ensiie d'un update en annonce
- Tableaux de modules (requetes sur annonces d'offres et de demande partitionnées) ou chaque element est une annonce cliquable qui renvoi automatiquement vers une page annexe indiquant les informations de l'annonce

### III Annonce d'offre

Celle-ci, permet à l'utilisateur d'envoyer une annonce sur le site, qui sera indéxée et visible dans le browse par d'autres utilisateurs.
Cette annonce peut etre visible a partir de "Mes Annonces" et l'internaute pourra decider si elle a ete repondue ou non en cochant "Fini", 
la supprimant, lorsque les deux partis sont satisfaits.

L'annonce d'offre doit comporter:
- Un input du titre 
- Un choix de Semestre
- Un radio de Module lorsque le semestre a été choisi
- Une courte description de l'offre
- Un radio sur le choix d'echange:
 * troc (demande de service a discuter avec l'échangeur) - A ce moment-la, avoir une option pour preciser en 80 caracteres max
 * Remuneration (a remettre en personne propre) - A ce moment-la, preciser la somme en euros
 * Pro-Bono - vous etes le Christ incarné et ne demandez rien en retour

### IV Annonce de demande

IDEM.

L'annonce d'offre doit comporter:
- Un input du titre 
- Un choix de Semestre
- Un radio de Module lorsque le semestre a été choisi
- Une courte description de l'offre
- Un radio sur le choix d'echange:
 * troc (demande de service a discuter avec l'échangeur) - A ce moment-la, avoir une option pour preciser en 80 caracteres max
 * Remuneration (a remettre en personne propre) - A ce moment-la, preciser la somme en euros
 * Rien <- vous n'offrez rien et etes Satan incarné, vous etes un enculé

 
#### Les objectifs sont donc:

1. Html
2. Relationnel

###  Tables

```
Table USER
int id
varchar username
varchar mdp
addr email

Table Annonce
int id
int id_user
int semestre
varchar module
varchar type
varchar description
int paiement
varchar service
int answered <-- 0 ou 1

Table Offre inherits Annonce

Table Demande inherits Annonce

Table tags <- clefs etrangeres

int annonce_ou_offre <- 1 si offre, 0 si demande
int semestre 
varchat module
int payant <-- 0 ou 1 a chaque fois
int gratuit
int service
varchar type
```

### Design

Mettre au point un réel travail de design et CSS pour pouvoir creer un environnement intuitif, professionnel et ergonomique pour l'utilisateur.
Toute attention à l'ésthétique sera appréciée.