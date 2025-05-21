# Fiche Mission Raphael – Création de la page Espace Etudiant

## Développement d’un Espace Étudiant – Masson Formation

## Contexte Général

Masson Formation est un organisme de formation qui propose des parcours aussi bien en **présentiel qu’en ligne**. Jusqu’à maintenant, le site était principalement tourné vers les **enseignants** et **administrateurs**.
La mission qui m’a été confié est de **concevoir un espace dédié aux étudiants**, simple, clair, sécurisé, et pratique à utiliser. L’objectif est que chaque étudiant puisse accéder facilement à **ses cours, ses examens, ses devoirs** et recevoir un **suivis automatique**.



##  Objectifs de la Mission

Le nouvel espace étudiants devras permettre plusieurs fonctionnalités:

* **Téléchargement de ressources pédagogiques** : Cours, exercices et corrections, sous forme de fichiers ZIP.
* **Masque automatique** les anciens cours et autres pendant un examen actif (les étudiants ne voient que l’examen).
* **Dépôt de devoirs** avec vérification du nom du fichier et **confirmation automatique par mail**.
* **Suivi en temps réel** des rendus d’examen, visible côté enseignant.
* **Interface admin** simplifiée pour uploader les contenus facilement (cours, devoirs, corrections, examens).
* **Téléchargement de ressources pédagogiques** : Cours, exercices et corrections, sous forme de fichiers ZIP.

## Utilisateurs concernés

* **Étudiants** :

  * Accès aux ressources (cours, exos…)
  * Téléchargement des fichiers.
  * Accès aux examens actifs uniquement
  * Dépôt de devoirs, avec mail de confirmation.

* **Ecole** :

  * Accès aux ressources (cours, exos…)
  * Téléchargement des fichiers.
  * Accès aux examens actifs uniquement
  * Accès aux notes du controle
  * Dépôt de devoirs, avec mail de confirmation.

* **Enseignants / Admins** :
  * Upload de fichiers.
  * Création et activation d’examen
  * Visualisation des rendus étudiants en temps réel

* 
    **Chaque étudiant est rattaché à une école spécifique ou un formateur MF enseigne .**
    -L’interface doit afficher uniquement les contenus correspondant à l’école sélectionnée (ex : un étudiant de l'efrei ne verra pas les documents SUPDEWEB).**

* **Mathieu (Designer)** :

  * Conception des maquetteS
  * Définition d’une **charte graphique claire et agréable** à utiliser



##  Scénarios utilisateurs

**Scénario 1 – Téléchargement de cours**
L'étudiant se connecte → accède à la liste des cours → clique sur "Télécharger le ZIP" → téléchargement immédiat.

**Scénario 2 – Examen actif**
Un examen est lancé → tous les contenus précédents sont masqués → seule l’épreuve est affichée; avec la possibilité de déposer son fichier.

**Scénario 3 – Dépôt de projet**
L'étudiant dépose son devoir sous le format **Nom\_Prenom\_Matiere\_Date.zip** → un e-mail est envoyé automatiquement avec confirmation (nom et taille du fichier).

**Scénario 4 – Suivi des rendus**
L’enseignant se connecte à l’espace admin → il voit le **nombre d’élèves ayant rendu le devoir en temps réel** → possibilité de télécharger tous les rendus d’un coup.



##  Fonctionnalités Clés

* **Téléchargement ZIP** :

  * Organisation des fichiers par matière.
  * Liens direct sur chaque ressource.

* **Masquage automatique pendant les examens** :

  * Contrôle dynamique de l’affichage selon le statut de l’examen.

* **Dépôt de devoir avec confirmation mail** :

  * Convention stricte de nommage des fichiers.
  * Email automatique envoyé avec nom du fichier + taille.
  * Exemple de fonction :


* **Suivi des rendus** :

  * Mise à jour automatique des données.
  * Visualisation par enseignant de tous les projets rendus



##  Espace Administrateur

* Formulaire d’ajout de fichiers : cours, devoirs, examens.
* Champs : nom du fichier, type (cours/exam), matière.
* Activation/désactivation d’un examen en un clic.
* **Compteur en temps réel** des devoirs rendus.
* Accès aux informations des étudiants ayant rendu leur travail.


##  Structure de la Base de Données (sql)

**Tables clés :**

- Écoles : id, nom, description
- Étudiants : nom, prénom, email, mot de passe, école_id (clé étrangère)
- Matières : nom, école_id, enseignant
- Supports : fichier, matière_id, type
- Examens : date, titre, visible, école_id
- Rendu : fichier, étudiant_id, examen_id, taille, date

##  UX / Design

* Collaboration avec Mathieu (designer) :

  * Interface **minimaliste et intuitive**.
  * Boutons visibles, contraste élevé, couleurs cohérentes.
  * Responsive : compatible **mobile et tablette**.
  * Design **accessible à tous**.



##  Sécurité & Contrôle

* Connexion sécurisée avec **sessions PHP**.
* Contrôle des noms et tailles de fichiers au dépôt.
* Aucun accès aux anciens supports pendant un examen actif.
* Blocage des utilisateurs en cas d’échec répété de connexion.



##  Exemple de mail de confirmation

Bonjour *,

Nous avons bien reçu votre projet : Nom_Prenom_Matiere_Date.zip (taille : 4.2 Mo).

Merci,
L’équipe Masson Formation.




##  Technologies utilisées
 Module              Techno prévues                  
  
 Interface étudiant  HTML, CSS, JavaScript, PHP, SQL 
 Interface admin     PHP                             
 Backend             PHP orienté objet               
 Emails              Templates HTML + fonctions PHP  
 ZIP fichiers        JS , PHP           
 Base de données     MySQL                           


##  Planning (a voir avec l'avancé du projet)

 Étapes                       Durée estimée 

 Analyse des besoins          ? jour        
 Maquettes (avec Mathieu)     ? jour        
 Conception de la BDD         ? jours       
 Dev interface Étudiant       ? jours       
 Dev interface Admin          ? jours       
 Intégration email + suivi    ? jours       
 Phase de test & corrections  ? jours       


## Conclusion

Ce projet vise à améliorer **l’expérience des étudiants** des écoles rattachés à Sébastien Masson et mathieu. 
L’espace créé   
doit être **utile, fluide et agréable à utiliser**.L’approche reste pro, mais simple : on fait un outil qui aide
vraiment les étudiants au quotidien.

