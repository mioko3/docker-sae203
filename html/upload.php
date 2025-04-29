<?php
// Dossier où les fichiers seront stockés
$uploadDir = 'uploads/';

// Vérification si des fichiers ont été envoyés
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileInput'])) {
    $files = $_FILES['fileInput'];

    // Créer le dossier si nécessaire
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Parcourir les fichiers envoyés
    for ($i = 0; $i < count($files['name']); $i++) {
        $fileName = basename($files['name'][$i]);
        $fileTmpName = $files['tmp_name'][$i];
        $filePath = $uploadDir . $fileName;

        // Vérification si le fichier existe déjà
        if (!file_exists($filePath)) {
            if (move_uploaded_file($fileTmpName, $filePath)) {
                echo "Le fichier $fileName a été téléchargé avec succès.<br>";
            } else {
                echo "Erreur lors du téléchargement du fichier $fileName.<br>";
            }
        } else {
            echo "Le fichier $fileName existe déjà.<br>";
        }
    }
}
?>
