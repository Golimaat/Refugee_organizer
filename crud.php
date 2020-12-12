<?php

$conn2 = new mysqli("localhost", "root", "", "refugee_db") or die ("error: " . mysqli_error($conn2));

session_start();

if(isset($_POST['save'])){
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password= $_POST['password'];

        $iQuery = "INSERT INTO data_tbl(username, password) values(?, ?)";

        $stmt = $conn2->prepare($iQuery);
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            $_SESSION['msg'] = "New record is successfully inserted";
            $_SESSION['alert'] = "alert alert-success";
        }
        $stmt->close();
        $stmt->close();
    }else{
        $_SESSION['msg'] = "Username and password should not be empty";
        $_SESSION['alert'] = "alert alert-warning";
    
    }
    header("location: login.php");
}

if(isset($_POST['delete'])){
    $ID = $_POST['delete'];

    $dQuery = "DELETE FROM data_tbl WHERE ID = ?";
    $stmt = $conn2->prepare($dQuery);
    $stmt->bind_param('i',$ID);
    if($stmt->execute()){
        $_SESSION['msg'] = "Selected record is successfully deleted.";
        $_SESSION['alert'] = "alert alert-danger";
    }
    $stmt->close();
    $stmt->close();
    header("location: login.php");
}

if(isset($_POST['edit'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ID = $_POST['edit'];

        $uQuery = "UPDATE data_tbl SET username = ?, password = ? WHERE ID =?";

        $stmt = $conn2-> prepare($uQuery);
        $stmt->bind_param('ssi', $username, $password, $ID);

        if($stmt->execute()){
            $_SESSION['msg'] = "Selected record is successfully updated.";
            $_SESSION['alter'] = "alter alter-success";
        }
        $stmt->close();
        $conn2->close();
    }else{
        $_SESSION['msg'] = "Username and password should not be empty";
        $_SESSION['alert'] = "alert alert-warning";
    
    }
    header("location: login.php");
}

?>