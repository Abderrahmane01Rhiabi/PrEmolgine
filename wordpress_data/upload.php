<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageData = $_POST['image'];
    $fileName = $_POST['filename'];
    $uploadDir = 'wp-content/uploads/pics/';

    // Create the upload directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $filePath = $uploadDir . $fileName;

    // Save the image data to a file
    $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
    file_put_contents($filePath, $imageData);

    echo 'Image uploaded successfully';
} else {
    echo 'Invalid request method';
}