## 1. Diagramme de cas d'utilisation

### 1.1. <u>Description des acteurs</u>

#### 		a. Administrateur

​		L'administrateur dans notre système est l'entité chargée d'ajouter, de supprimer, de créer, de modifier er de rechercher les informations proposées par l'application (telles que les informations sur les membres, l'état de la caisse, les contributions des membres, ...).

#### 			b. Invité (Enseignant)

​		L'invité est ici une entité capable de consulter les informations proposées par l'application sans toute fois la possibilité de les modifier.

### 1.2. <u>Description des cas d'utilisation</u>

​	Dans cette partie sont listées les différents cas d'utilisation de l'application accompagnés de leur description.

#### 	a. Ajout d'un membre

- <b>Objectifs</b>  : inscrire un membre à la mutuelle d'un enseignant.

- <b>Acteur concerné </b> : Administrateur.

- **Pré-condition**: l'administrateur doit être authentifié à l'avance.

- **Scénario nominal** : 

  L'application propose une zone de saisie d'informations à l'administrateur.

  L'administrateur remplit les différents champs. 

  L'administrateur valide sa saisie en cliquant sur un bouton confirmer.

- **Scénario alternatif** : 

  * L'administrateur entre des informations qui ne sont pas conformes aux formats proposés.

    Dans ce cas, l'application renvoie un message d'erreur à l'administrateur. 

  * L'administrateur ferme accidentellement la page d'ajout de compte.

    L'application ne prend pas en compte les modifications qu'il a effectué.

  #### b. Gestion des épargnes

- **Objectifs **: Ajouter une épargne ou en retirer pour un membre donné.

- **Acteur concerné** : Administrateur.

- **Pré-condition** : L'administrateur doit s'être authentifié au préalable.

- **Scénario nominal** : 

  L'application propose à l'administrateur 2 options :

  - *ajouter une épargne*:  

    L'application soumet à l'administrateur un formulaire contenant les informations nécessaires pour ajouter une contribution.

    L'administrateur clique sur confirmer pour valider l'épargne

  - *retirer une épargne*: 

    L'application propose à l'administrateur l'ensemble des membres.

    L'administrateur choisi un membre en particulier.

    L'application propose un formulaire proposant de remplir une somme (correspondant au retrait).

    L'administrateur clique sur confirmer pour confirmer le retrait.

- **Scénario alternatif** :

  - *Dans le cas où l'administrateur saisie une donnée erronée*, l'application renvoie une erreur et le redirige vers la même page afin qu'il puisse tenter de nouveau.
  - *Dans le cas où un membre n'a plus rien dans son compte épargne et que l'administrateur tente d'effectuer un retrait*, l'application renvoie une erreur. 

  #### 	c. Gestion des emprunts

- **Objectifs** : Permettre à un membre donné d'effectuer des emprunts.

- **Acteur concerné** : Administrateur. 

- **Pré-condition** : L'administrateur doit s'être authentifié au préalable.

- **Scénario nominal** : 

  L'application présente à l'administrateur une liste des membres.

   

- **Scénario alternatif**

#### 	d. Gestion des remboursements

- **Objectifs** :
- **Acteur concerné** :
- **Pré-condition** :
- **Scénario nominal** : 
- **Scénario alternatif**

#### 	e. Gestion fond social

- **Objectifs**
- **Acteur concerné**
- **Pré-condition**
- **Scénario nominal**
- **Scénario alternatif**

#### 	f. Modifier les paramètres de l'application

- **Objectifs** : Mise à jour des données de l'application. 

- **Acteur concerné** : Administrateur.

- **Pré-condition** : L'administrateur doit être au préalable authentifié.

- **Scénario nominal** : 

  L'application dispose d'un bouton de configuration.

  L'administrateur clique sur le bouton de configuration.

  L'application ouvre une page de configuration contenant un formulaire et ayant ses champs remplis par défaut par les paramètres de l'application.

  L'administrateur saisie des informations et confirme.

  L'application enregistre les informations saisies. 

- **Scénario alternatif** : 

  Dans le cas où l'administrateur ferme accidentellement la page de configuration sans avoir cliquer sur le bouton de confirmation, l'application ne tiendra pas compte des modifications apportées.

#### 	g. Authentification

- **Objectifs** : Permettre aux différents acteurs l'accès à l'application.

- **Acteur concerné** : Administrateur, Invités.

- **Pré-condition** : Il faut qu'ils soient enregistrés au préalable.

- **Scénario nominal** : 

  - L'application propose à l'acteur une page d'authentification
  - L'acteur saisie ses informations
  - L'application renvoie l'acteur à la page principale.

- **Scénario alternatif** : 

  L'acteur saisit des informations erronées. L'application lui renvoie la page d'authentification. 

#### 	h. Déconnexion

- **Objectifs** : Déconnecter un utilisateur de l'application.

- **Acteur concerné** : Administrateur, Invités

- **Pré-condition** : Il faut que l'acteur soit au préalable authentifié.

- **Scénario nominal** : 

  - L'acteur clique sur le bouton de déconnexion.
  - L'application déconnecte l'acteur courant et le renvoie à la page d'authentification (en ce qui concerne l'administrateur, on enregistre les paramètres de l'application).  

- **Scénario alternatif** : 

  l'acteur ferme la page de l'application. 

  L'application déconnecte automatiquement l'acteur courant.

### 1.3. <u>Diagramme</u>



