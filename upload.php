<?php
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["userfile"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$data = [];
$stat = '';
$msg = '';


//var_dump($data);die();

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $stat = "error";
    $msg = "Sorry, your file is too large.";
    $data['stat'] = [$stat,$msg];
    $uploadOk = 0;
    echo json_encode($data);
}else
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $stat = "error";
    $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $data['stat'] = [$stat,$msg];
    $uploadOk = 0;
    echo json_encode($data);
}
else
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $stat = "error";
    $msg = "Sorry, your file was not uploaded.";
    $data['stat'] = [$stat,$msg];
    echo json_encode($data);
// if everything is ok, try to upload file
} 
else {
    $check = getimagesize($_FILES["userfile"]["tmp_name"]);
    // Check if file already exists
    if (file_exists($target_file)) {
        $stat = "success";
        $msg = "";
        $data["image"] = [$target_file,$check[0],$check[1]];
        $data['stat'] = [$stat,$msg];
        echo json_encode($data);
    }
    else if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        $stat = "success";
        $msg = "";
        $data["image"] = [$target_file,$check[0],$check[1]];
        $data['stat'] = [$stat,$msg];
        echo json_encode($data);
    }
    else {
        $stat = "error";
        $msg = "Sorry, there was an error uploading your file.";
        $data['stat'] = [$stat,$msg];
        echo json_encode($data);
    }
}
?>