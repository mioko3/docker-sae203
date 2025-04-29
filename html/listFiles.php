<?php
$uploadDir = 'uploads/';
$files = scandir($uploadDir);
$files = array_diff($files, array('.', '..')); // Exclure les éléments "." et ".."

echo json_encode($files);
?>
