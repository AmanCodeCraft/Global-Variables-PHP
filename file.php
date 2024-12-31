<?php

if (isset($_FILES['file'])) {
    $image = $_FILES['file'];
    $imageName = $image['name'];
    $imageTempName = $image['tmp_name'];

    $uploadDirectory = "./images/";
    $newImgName = basename($imageName);

    if (move_uploaded_file($imageTempName, $uploadDirectory . $newImgName)) {
        $imagepath = $newImgName;
        echo "Image uploaded successfully";
    } else {
        echo "Not uploaded";
    }
}
