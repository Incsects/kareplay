<?php require 'baglan.php'; session_start();  ob_start();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>KarePlay.com - QR Kod ile yükle!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src="https://kit.fontawesome.com/eb69704276.js" crossorigin="anonymous"></script>
    <script src='main.js'></script>
    <link rel="icon" href="cdn/logo/kareplay.png" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/eb69704276.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Bungee&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Anton&family=Bungee&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Oswald&display=swap');

        @keyframes slideUp{
            from{
                opacity:0;
                bottom: -200px;
            }
            to{
                opacity:1;
                bottom:0;
            }
        }

        .kutu{
            z-index: 1;
            width: 100%;
            padding: 33px 0px;
            background-color: #3363ff;
        }

        .fontlu{
            font-family: Arial;
        }

        .renk{
            background-color: #3363ff!important;
        }

        #signature {
            color: rgb(212, 212, 212);
            text-align:center;
            font-size: 15px;
            text-decoration: none;
            list-style-type: none;
            font-family: Oswald;
        }

        .btn {
            background-color: #3363ff!important;
        }

        #ekle {
            color: white;
        }

        .card-header {
            text-align: center;
        }

        .alert {
            text-align: center;
        }

        #alerttext {
            color: white;
            background-color: #3363ff!important;
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #485A81;">
<?php
if (!isset($_SESSION['admin'])){
    header("Location: ../404.php");
}
?>
<div class="container">
   <form method="post">
       <div class="row">
           <div style="margin-top: 150px"></div>
           <div class="alert col-md-12" id="alerttext">Lütfen bilgilerinizi kontrol ederek girin. Bu işlem ancak Database üzerinden silinebilir.</div>
           <?php

           if(isset($_POST['ekle'])){
               $baslik = $_POST['card_ad'];
               $yazi = $_POST['card_text'];
               $resim = $_POST['card_image'];
               $modal = $_POST['modal_image'];
               $EmailSay = $db->prepare("SELECT * FROM karekod_card WHERE karekod_baslik = ?");
               $EmailSay->execute(array($baslik));
               $kontrol = $EmailSay->fetch(PDO::FETCH_ASSOC);
               if($kontrol > 0) {
                   echo '
                    <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                      <strong></strong> Girmiş olduğunuz kart bilgileri zaten kayıtlı.
                      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>';
               }else{
                   $dbekle = $db->prepare("INSERT INTO karekod_card (karekod_baslik, card_yazi, card_image, modal_image) VALUES (?,?,?,?) ");
                   $dbekle->execute([
                       $baslik, $yazi, $resim, $modal
                   ]);
                   if ($dbekle){
                       echo '
                    <div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                      <strong></strong> Card ekleme işlemi başarılı.
                      <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                    </div>';
                   }
               }
           }
           ?>
           <div class="card col-md-12 mx-auto">
               <div class="card-header">KarePlay - Uygulama ekleme ekranı</div>
               <div class="card-body">
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-sketch"></i></span>
                       </div>
                       <input type="text" class="form-control" name="card_ad" placeholder="Uygulama ismi" aria-describedby="basic-addon1">
                   </div>
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                       </div>
                       <input type="text" class="form-control" name="card_text" placeholder="Uygulama açıklaması" aria-describedby="basic-addon1">
                   </div>
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-bandcamp"></i></span>
                       </div>
                       <input type="text" class="form-control" name="card_image" placeholder="Uygulama banneri" aria-describedby="basic-addon1">
                   </div>
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-qrcode"></i></span>
                       </div>
                       <input type="text" class="form-control" name="modal_image" placeholder="QR Kod resmi" aria-describedby="basic-addon1">
                   </div>
               </div>
           </div>
           <button class="btn f-right" name="ekle" id="ekle"><i class="fa-solid fa-plus"></i> Ekle</button>
       </div>
   </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
