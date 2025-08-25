<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = __DIR__ . "/uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo "File uploaded: " . htmlspecialchars($uploadFile);
    } else {
        echo "Upload failed.";
    }
} else {
?>
<form enctype="multipart/form-data" method="POST">
  <input type="file" name="file">
  <input type="submit" value="Upload">
</form>
<?php
}