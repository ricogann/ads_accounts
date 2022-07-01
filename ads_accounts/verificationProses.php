<?php

    require ('./config/koneksi.php');

    if(isset($_POST['code'])){
        
        $code = $_POST['code'];
        $sql = "SELECT * FROM accounts where code = '$code'";
        $query = mysqli_query($con,$sql);
        $up_code = random_int(0, 999999);

        if(mysqli_num_rows($query) > 0){
            session_start();

            $user = mysqli_fetch_assoc($query);
            session_start();
            $_SESSION['user'] = $user;
            echo $_SESSION['user']['telepon'];
            $code = $user['code'];
            echo $code;
            $sql = "UPDATE accounts set code=$up_code, is_verified=1 where code=$code";
            $query = mysqli_query($con,$sql);

            if($query){
                header("location: ../ads_accounts/datadiri.php");
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