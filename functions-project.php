<?php
session_start();
include("connection.php");

    //upload
    if (isset($_POST['upload'])) {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $uploaded_by = mysqli_real_escape_string($con, $_POST['uploadedBy']);
        $file = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_folder = 'uploaded_files/' . $file;
        $file_type = pathinfo($file_folder, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4', 'mov', 'webm', 'avi', 'flv', 'docx', 'ppt', 'pdf','html');


        if (in_array($file_type, $allowTypes)) {
            $insert_query = mysqli_query($con, "INSERT INTO `projects`(title, uploaded_by, file) VALUES('$title', '$uploaded_by', '$file')") or die('query failed');

            if ($title == '' or $file == '') {
                echo "<script>alert('Please fill all input fields!')</script>";
                exit();
            } else if ($insert_query) {
                move_uploaded_file($file_tmp_name, $file_folder);
                $message[] = 'file add succesfully';
                header('location:project.php');
            } else {
                $message[] = 'could not add the file';
                header('location:project-create.php');
            }
        }
    }
    ;

    //delete
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($con, "DELETE FROM `projects` WHERE pid = $delete_id ") or die('query failed');
        if ($delete_query) {
            header('location:project.php');
            $message[] = 'file has been deleted';
        } else {
            header('location:project.php');
            $message[] = 'file could not be deleted';
        }
        ;
    }
    ;

 //update
 if (isset($_POST['update'])) {
    $update_id = $_POST['update_id'];
    $update_title = $_POST['update_title'];
    $update_uploader = $_POST['update_uploadedBy'];
    $update_file = $_FILES['update_file']['name'];
    $update_file_tmp_name = $_FILES['update_file']['tmp_name'];
    $update_file_folder = 'uploaded_files/' . $update_file;
    $file_type = pathinfo($update_file_folder, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4', 'mov', 'webm', 'avi', 'flv', 'docx', 'ppt', 'pdf' ,'html');

    if (in_array($file_type, $allowTypes)) {
        $update_query = mysqli_query($con, "UPDATE `projects` SET title = '$update_title', file = '$update_file', uploaded_by = '$update_uploader' WHERE pid = '$update_id'");

        if ($update_query) {
            move_uploaded_file($update_file_tmp_name, $update_file_folder);
            $message[] = 'file updated succesfully';
            header('location:project.php');
        } else {
            $message[] = 'file could not be updated';
            header('location:project-edit.php');
        }

    }
}

;