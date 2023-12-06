<?php
session_start();
include_once "connection.php";

if (isset($_POST["submit_btn"])) {
    $name = htmlspecialchars($_POST["name"]);
    $id = htmlspecialchars($_POST["id"]);
    $email = htmlspecialchars($_POST["email"]);
    $vehicleNo = htmlspecialchars($_POST["vehicleNo"]);
    $chassisNo = htmlspecialchars($_POST["chassisNo"]);
    $presentAddress = htmlspecialchars($_POST["presentAddress"]);
    $permanentAddress = htmlspecialchars($_POST["permanentAddress"]);

    $profile_pic = $_FILES["profile_pic"];
    $nidSoftCopy = $_FILES["nidSoftCopy"];

    if ($_FILES["profile_pic"]["error"] == UPLOAD_ERR_OK && $_FILES["nidSoftCopy"]["error"] == UPLOAD_ERR_OK) {
        // Specify the target directory to save the uploaded files
        $targetDir = "./uploads/";

        // Create the target directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Get the file name with path
        $target_file = $_FILES["profile_pic"]["name"];
        $image_tmp_name = $_FILES["profile_pic"]["tmp_name"];
        $imageFileExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $profile_pic = "./uploads/" . $email . "." . $imageFileExt;

        // Get the file name with path
        $target_file = $_FILES["nidSoftCopy"]["name"];
        $file_tmp_name = $_FILES["nidSoftCopy"]["tmp_name"];
        $FileExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $nidSoftCopy = "./uploads/" . $email . "." . $FileExt;


        if ($imageFileExt != "jpg" && $imageFileExt != "png" && $imageFileExt != "jpeg" && $imageFileExt != "gif" ) {
            header("Location: ../../Form.html?msg=Sorry, only JPG, JPEG, PNG and GIF files are allowed");
            exit();
        } else if($FileExt != "pdf"){
            header("Location: ../../Form.html?msg=Sorry, only PDF allowed");
            exit();
        } else{
            move_uploaded_file($image_tmp_name, $profile_pic) && move_uploaded_file($file_tmp_name, $nidSoftCopy);

            $sql = "INSERT INTO `form` (`name`, `email`, `id`, `vehicleNo`, `chassisNo`, `profile_pic`, `nidSoftCopy`, `presentAddress`, `permanentAddress`) VALUES ('$name', '$email', '$id', '$vehicleNo', '$chassisNo', '$profile_pic', '$nidSoftCopy', '$presentAddress', '$permanentAddress')";
            if(mysqli_query($conn, $sql)){
                header("Location: ../../Form.html?success_msg=Submition Success");
                exit();
            } else{
                header("Location: ../../From.html?msg=Submition Failed");
                exit();
            }
        }

    }
}
?>

