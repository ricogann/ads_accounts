
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore mojokerto | Maari kita eksplor...</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="container-landing">
            <div class="content-landing">
            <form action="datadiriProses.php" method="POST">
                <br><br><br>
                <h2 class="heading-landing-verif">COMPLETE YOUR <br> PROFILE</h2>
                <p class="text-landing">Input your data</p>
                <div class="container-input-login">
                    <label for="nama" class="label-input-login"></label>
                    <input type="text" name="nama" id="nama" class="input-login" placeholder="Nama">
                </div>
                <div class="container-input-login">
                    <label for="telepon" class="label-input-login"></label>
                    <input type="number" name="telepon" id="telepon" class="input-login" placeholder="Telepon">
                </div>
                <div class="container-input-login">
                    <label for="birthday" class="label-input-login"></label>
                    <input type="date" name="birthday" id="birthday" class="input-login" placeholder="Birthday">
                </div>
                <div class="container-input-login">
                    <label for="gender" class="label-input-login"></label>
                    <input type="text" name="gender" id="gender" class="input-login" placeholder="Gender">
                </div>
                    <p class="text-landing">By continuing this registration, you agree to our Terms and Condition and Privacy Policy</p>
                    <button class="btn-landing main">CONTINUE</button> <br>
            </form>
            </div>
        </div>
    </div>   
</body>
</html>