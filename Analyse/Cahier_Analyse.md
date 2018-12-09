

# I. Analyse

## 1. Diagramme de cas d'utilisation

### 1.1. <u>Description des acteurs</u>

#### 		a. Administrateur

​		L'administrateur dans notre système est l'entité chargée d'ajouter, de supprimer, de créer, de modifier er de rechercher les informations proposées par l'application (telles que les informations sur les membres, l'état de la caisse, les contributions des membres, ...).

#### 			b. Invité (Enseignant)

​		L'invité est ici une entité capable de consulter les informations proposées par l'application sans toute fois la possibilité de les modifier.

### 1.2. <u>Description des cas d'utilisation</u>

​	Dans cette partie sont listées les différents cas d'utilisation de l'application accompagnés de leur description.

#### 	a. Ajouter un membre

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

  #### b. Gérer les épargnes

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

    L'application effectue l'opération et génère une fiche de retrait.

- **Scénario alternatif** :

  - *Dans le cas où l'administrateur saisie une donnée erronée*, l'application renvoie une erreur et le redirige vers la même page afin qu'il puisse tenter de nouveau.
  - *Dans le cas où un membre n'a plus rien dans son compte épargne et que l'administrateur tente d'effectuer un retrait*, l'application renvoie une erreur. 

  #### 	c. Gérer les emprunts

- **Objectifs** : Permettre à un membre donné d'effectuer des emprunts.

- **Acteur concerné** : Administrateur. 

- **Pré-condition** : L'administrateur doit s'être authentifié au préalable.

- **Scénario nominal** : 

  L'application présente à l'administrateur une liste des membres.

   L'administrateur cherche parmi les membres un en particulier. 

  L'application propose un formulaire pour mentionner la somme à emprunter.

  L'administrateur saisie une somme et valide en cliquant sur un bouton de confirmation.

  L'application effectue l'opération.

- **Scénario alternatif** :

  - Dans le cas où le membre n'est pas autorisé à emprunter (lorsqu'il n'est pas à jour), l'application renvoie à l'administrateur une erreur.
  - Dans le cas où l'administrateur ferme accidentellement la page sans toute fois avoir confirmer, les modifications ne seront pas prises en compte par l'application.

  #### 	d. Gérer les remboursements

- **Objectifs** : Permettre à un membre de rembourser ses emprunts.

- **Acteur concerné** : Administrateur.

- **Pré-condition** : L'administrateur doit s'être authentifié au préalable.

- **Scénario nominal** : 

  L'application présente une interface à l'administrateur contenant une liste des membres.

  L'administrateur recherche et sélectionne un membre en particulier parmi la liste des membres.

  L'application présente un formulaire à propos du montant à entrer à l'administrateur ainsi que le montant qu'il doit.

  L'administrateur saisie les informations nécessaires puis valide en cliquant sur un bouton de confirmation.

  L'application effectue l'opération.

- **Scénario alternatif** : 

  Dans le cas où le montant à rembourser est nul et que l'administrateur rentre quand même une somme, l'application lui renvoie un message d'erreur.

#### 	e. Gérer le fond social

- **Objectifs** : Permettre de d'apporter un soutien financier aux membres en cas d'évènements (ou de circonstances) particulières.

- **Acteur concerné** : Administrateur.

- **Pré-condition** : L'administrateur doit s'être authentifié au préalable.

- **Scénario nominal** : 

  L'application propose un ensemble de choix (types d'évènements).

  L'administrateur en choisit un et confirme.

  L'application effectue l'opération.

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

#### 	g. S'authentifier

- **Objectifs** : Permettre aux différents acteurs l'accès à l'application.

- **Acteur concerné** : Administrateur, Invités.

- **Pré-condition** : Il faut qu'ils soient enregistrés au préalable.

- **Scénario nominal** : 

  L'application propose à l'acteur une page d'authentification.

  L'acteur saisie ses informations.

  L'application renvoie l'acteur à la page principale.

- **Scénario alternatif** : 

  L'acteur saisit des informations erronées. L'application lui renvoie la page d'authentification. 

#### 	h. Se déconnecter

- **Objectifs** : Déconnecter un utilisateur de l'application.

- **Acteur concerné** : Administrateur, Invités

- **Pré-condition** : Il faut que l'acteur soit au préalable authentifié.

- **Scénario nominal** : 

  L'acteur clique sur le bouton de déconnexion.

  L'application déconnecte l'acteur courant et le renvoie à la page d'authentification (en ce qui concerne l'administrateur, on enregistre les paramètres de l'application).  

- **Scénario alternatif** : 

  l'acteur ferme la page de l'application. 

  L'application déconnecte automatiquement l'acteur courant.

#### i. Consulter les informations

- **Objectifs** : Permettre à un membre de consulter ses informations.

- **Acteur concerné** : Invités

- **Pré-condition** : Il faut que l'invité soit au préalable authentifié.

- **Scénario nominal** : 

  L'application propose à l'invité un ensemble d'informations.

  L'invité sélectionne la rubrique qui l'intéresse.  

### 1.3. <u>Diagramme</u>



![Diagrammes_UML-DCU](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-DCU.png)



### 2. Diagrammes d'activité

#### 	2.1. Ajouter un membre

#### 	2.2. Gérer les épargnes

#### 	2.3. Gérer les emprunts

#### 	2.4. Gérer les remboursements

#### 	2.5. Gérer le fond social

#### 	2.6. Modifier les paramètres de l'application

#### 	2.7. S'authentifier

#### 	2.8. Se déconnecter

#### 	2.9. Consulter les informations

# II. Conception

## 1. Diagramme de séquence

​	Nous utiliserons pour notre application un design pattern MVC afin de mieux structurer notre logique applicative.

#### 1.1. Ajouter un membre

![Diagrammes_UML-Ajout membre](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-Ajout membre.png)

#### 1.2. Gérer les épargnes

![Diagrammes_UML-sequence_gestion_epargnes](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-sequence_gestion_epargnes.png)

#### 1.3. Gérer les emprunts

![Diagrammes_UML-sequence_gestion_emprunts](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-sequence_gestion_emprunts.png)

#### 1.4. Gérer les remboursements

![Diagrammes_UML-sequence_gestion_remboursements](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-sequence_gestion_remboursements.png)

#### 1.5. Gérer le fond social

![Diagrammes_UML-sequence_gestion_fond_social](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-sequence_gestion_fond_social.png)

#### 1.6. Modifier les paramètres de l'application

![Diagrammes_UML-sequences_gestion_paramètres](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-sequences_gestion_paramètres.png)

#### 1.7. S'authentifier

![Diagrammes_UML-sequence_authentification](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-sequence_authentification.png)

#### 1.8. Consulter les informations

Il s'agit ici, simplement de l'accès des différents modules de l'application en mode  lecture.

## 2. Diagramme de classe

![Diagrammes_UML-Page-10](C:\Users\SCrf1\Desktop\projet IHM\mutuelle-enseignants\Analyse\Diagrammes_UML-Page-10.png)

