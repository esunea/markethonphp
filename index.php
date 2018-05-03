<?php
require_once("functions.php");

// TODO priority 1
// refactorer IdEntreprise en entrprise_id
// quand ON ESSAYE D'editer une offre qui n'existe pas
// mettre les verifs dans le modèle et retourner vrai ou faux
// remonter les erreurs
// faire des jointures pour le nom des entreprises

// TODO priority 2
// passer page en singleton (et faire un getInstace dans la pagination)

$page = new Page();
// Done
// trouver comment passer le max_offres a pagination
// afficher la pagination dans les lists
// gérer le param get dans les lists
// ne pas afficher le login quand on clique sur inscription
// mettre a jour list offres avec la pagination