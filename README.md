# Pokedex
Pokedex / css - php - sql

Un simple projet mêlant php, css et sql. Site entièrement réalisé "from scratch".
Vous retrouverez toutes les informations necessaires dans ce fichier.

La base de données est présente, vous pouvez l'importer dans PhpMyAdmin. Au besoin, le fichier "bd" contient les informations de connexion à la base de données.

Pour les 2 users qui existent :
- sasha@gmail.com   -   Azertyuiop1
- rocket@gmail.com   -   Azertyuiop2

Le cahier des charges :

  Vérification des formulaires :
  verif_inscription.php :
  - le pseudo n’est pas déjà utilisé
  - l’email n’est pas déjà utilisé
  - le mot de passe contient au moins 8 caractères dont une majuscule, une minuscule et un chiffre
  - l’image de profil est bien une image et ne dépasse pas 1Mo
  verif_connexion.php :
  - l’email et le mot de passe correspondent à un utilisateur en base de données
  verif_pokemon.php
  - le nom n’est pas déjà utilisé
  - tous les champs sont remplis

  Complémentaire :
  - Les pokemons que l'utilisateur a ajouté s'affichent sur son profil, mais pas les autres
  - La collection affiche tous les pokemons qui existent
  - Pas de page pour supprimer un pokemon ou un utilisateur (le faire via mysql)
  - Le footer devra comprendre un script php pour afficher l'année actuelle
  - Le footer ne devra pas remonter en plein milieu pour les pages n'ayant pas de contenu jusqu'en bas. Cependant, il ne doit pas non plus être fixé.

  Les redirections :
  - Après une connexion réussie retour vers la page d'acceuil sans être connecté
  - Après un échec de connexion, retour vers la page de connexion accompagnée d'un message
  - Après l'ajout d'un pokemon, redirection vers la page d'ajout des pokemons
