<?php
$directory = 'uploads/';  // Dossier où les fichiers sont stockés
// Vérifie si le répertoire existe
if (!is_dir($directory)) {
    echo json_encode([]); // Si le répertoire n'existe pas, on renvoie un tableau vide
    exit;
}

$files = array_diff(scandir($directory), array('..', '.'));  // Liste les fichiers, ignore '.' et '..'

// Renvoie les fichiers sous forme de JSON
echo json_encode(array_values($files));
?>
