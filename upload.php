<?php
if (!empty($_FILES)) {
    $mime_valid = ['image/png', 'image/jpeg','image/gif'];
    $extension_valid = ['png', 'jpeg','jpg','gif'];
    $extension = pathinfo($_FILES['file']['name'])['extension'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
    // test le mime & l'extension avec pathinfo() -- On ne veut que des fichiers PNG
    if(in_array($extension, $extension_valid) && in_array($mime, $mime_valid)){
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    }
}
?>