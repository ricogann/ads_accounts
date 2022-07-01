<?php

    require ('./config/koneksi.php');
    session_start();
    $_SESSION['user'];

    $email = $_SESSION['user']['email'];

    if(isset($_POST['nama']) && isset($_POST['telepon']) && isset($_POST['birthday']) && isset($_POST['gender'])){
        

        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];

        $sql = "SELECT * FROM accounts where email = '$email'";
        $query = mysqli_query($con,$sql);

        if(mysqli_num_rows($query) > 0){

            $user = mysqli_fetch_assoc($query);

            $sql = "UPDATE accounts set nama='$nama', telepon='$telepon', birthday=$birthday, gender='$gender' where email='$email'";
            $query = mysqli_query($con,$sql);

            if($query){
                header("location: http://localhost/ads_accounts/home.php");
            }else{
                echo "YAH GAGAL ERROR : ".$query;
            }
        }else{
            echo "CODE TIDAK DITEMUKAN ATAU TIDAK VALID";
        }
    }else{
        echo "code ga nih!";
    }
?>