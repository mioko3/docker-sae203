<?php
$uploadDir = '../uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

foreach ($_FILES['fileInput']['tmp_name'] as $key => $tmpName) {
    $fileName = basename($_FILES['fileInput']['name'][$key]);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($tmpName, $targetFile)) {
        echo "Fichier $fileName téléchargé avec succès.\n";
    } else {
        echo "Erreur lors du téléchargement de $fileName.\n";
    }
}
?>
