<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="cdn/logo/kareplay.png" type="image/x-icon" />
    <title>Admin Giriş</title>
    <script src="https://kit.fontawesome.com/eb69704276.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>

.btn {
    background-color: #3363ff!important;
}

.alert {
    background-color: #BF5151!important;
    text-align: center;
 }

 #alerttext {
     color: white;
 }

 #giristext {
     color: white;
 }

 .submitbutton {
     text-align: right;
 }
</style>
<body style="background-color: #0D63BF">
    <div class="container">
        <div style="margin-top: 200px;"></div>
        <?php
        if(isset($_POST['g'])){
            $k = $_POST['k'];
            $s = $_POST['s'];

            if($k == "admin" AND $s == "adminpassword_haha"){
                $_SESSION['admin'] = 'admin';
                header('Location: ekle.php');
            }
            else{
                echo '<div class="alert mx-auto col-md-6 mb-3" id="alerttext">Girdiğiniz bilgiler hatalılı.</div>';
            }
        }
        ?>

        <div class="card mx-auto col-md-6">
            <form method="post">
                <div class="card-header text-center">Giriş yap</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-group"></i></span>
                        </div>
                        <input type="text" class="form-control" name="k" placeholder="Kullanıcı Adı" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="s" placeholder="Şifre" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="submitbutton"><button type="submit" name="g" class="btn" id="giristext">Giriş yap</button></div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>