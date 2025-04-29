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
        $fileName = preg_replace("/[^a-zA-Z0-9\-\_\.]/", "", $fileName);  // Sécuriser le nom du fichier
        $targetPath = $uploadDirectory . $fileName;

        // Vérification des erreurs de téléchargement
        if ($uploadedFiles['error'][$i] !== UPLOAD_ERR_OK) {
            echo "Erreur lors du téléchargement du fichier $fileName.<br>";
            continue;
        }

        // Vérification du type MIME du fichier
        $fileType = mime_content_type($uploadedFiles['tmp_name'][$i]);
        $allowedTypes = ['image/jpeg', 'image/png', 'video/mp4', 'audio/mpeg', 'text/plain'];

        if (!in_array($fileType, $allowedTypes)) {
            echo "Type de fichier non autorisé pour le fichier $fileName.<br>";
            continue;
        }

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
