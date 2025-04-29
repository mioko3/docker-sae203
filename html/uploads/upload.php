<?php
// Vérifier si des fichiers sont envoyés
if (isset($_FILES['fileInput']) && !empty($_FILES['fileInput']['name'])) {
    $uploadDirectory = 'uploads/';  // Le répertoire où les fichiers seront stockés
    $uploadedFiles = $_FILES['fileInput'];

    // Assurez-vous que le répertoire "uploads" existe
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Traiter chaque fichier téléchargé
    $fileCount = count($uploadedFiles['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = basename($uploadedFiles['name'][$i]);
        $targetPath = $uploadDirectory . $fileName;

        // Déplacer le fichier du répertoire temporaire vers le répertoire de téléchargement
        if (move_uploaded_file($uploadedFiles['tmp_name'][$i], $targetPath)) {
            echo "Le fichier $fileName a été téléchargé avec succès.<br>";
        } else {
            echo "Erreur lors du téléchargement du fichier $fileName.<br>";
        }
    }
} else {
    echo "Aucun fichier n'a été téléchargé.";
}
?>
