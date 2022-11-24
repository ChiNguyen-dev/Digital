<?php
$result = null;
$num_images = count($_FILES['file']['name']);
for ($i = 0; $i < $num_images; $i++) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], "../public/uploads/" . basename($_FILES['file']['name'][$i]))) {
        $result .= "<div class=\"thumnail\"><img src=\"public/uploads/{$_FILES['file']['name'][$i]}\"></div>";
    }
}
echo $result;
