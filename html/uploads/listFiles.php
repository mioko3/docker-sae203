<?php
$directory = 'uploads/';
$files = array_diff(scandir($directory), array('..', '.'));  // Liste les fichiers, ignore les éléments '.' et '..'

// Renvoie les fichiers sous forme de JSON
echo json_encode(array_values($files));
?>
