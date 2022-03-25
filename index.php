<!-- Developed By Incsects INC
laéx - github.com/thislaex
Ellwy - github.com/2qke -->

<?php
require 'php/baglan.php';
?>
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
    <link rel="shortcut icon" href="/php/cdn/logo/kareplay.png" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- TABLET -->
    <link rel="stylesheet" media="(max-width: 768px)" href="assets/css/tablet.css">
    <link rel="stylesheet" media="(max-width: 500px)" href="assets/css/mobile.css">
</head>
<body>

 <div class="kutu">
   <center><img src="php/cdn/logo/kareplay-banner-white.png" width="150px" height="40px"></center>
 </div>

 <div class="mb-3"></div>
 <div class="container-fluid">
     <div class="row">
         <?php
         $EmailSay = "SELECT * FROM karekod_card";
         $EmailKontrol = $db->query($EmailSay);
         while ($kontrol = $EmailKontrol->fetch(PDO::FETCH_ASSOC)){
             echo '<div class="col-md-5 text-center d-flex mb-2 align-items-stretch laex" style="max-width: 304px;">
             <div class="card">
                 <div class=""><img src="'.$kontrol['card_image'].'" class="img-fluid rounded"> </div>
                 <div class="card-body">
                     <h3 class="fontlu">'.$kontrol['karekod_baslik'].'</h3>
                     <p>'.$kontrol['card_yazi'].'</p>
                 </div>
                 <button class="btn" data-target="#'.$kontrol['karekod_baslik'].'" data-toggle="modal" id="butontext">QR Kodu görmek için tıkla. <i class="bi bi-qr-code-scan"></i></button>
             </div>
         </div>
         <div class="modal fade" id="'.$kontrol['karekod_baslik'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-lg" role="document">
        <div class="modal-content modal-content-lg">
            <div class="modal-header fontlu">
                <h5 class="mx-auto modal-title" id="exampleModalLabel">'.$kontrol['karekod_baslik'].'</h5>
                <h3 type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </h3>
            </div>
            <div class="modal-body">
                <img class="img-fluid rounded mb-2" src="'.$kontrol['modal_image'].'">
                <p class="text-center fontlu">Telefonundan QR Kod programını aç veya destekliyorsa kamerandan QR Kodu okut.</p>
            </div>
        </div>
    </div>
</div><br><br>';
         }
         ?>
     </div>
 </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<footer>
        <div class="footer-content">
            <h3><i class="fa-solid fa-qrcode"></i> KarePlay nedir?</h3>
            <p>KarePlay, şu anlık sadece QR (KareKod) ile uygulama indirme servisidir.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2022 <a href="https://incsects.com" target="_blank">Incsects INC.</a></p>
                    <div class="footer-menu">
                      <ul class="f-menu">
                        <li><a href="https://kareplay.incsects.com">Anasayfa</a></li>
                        <li><a href="/about">Hakkımızda</a></li>
                        <li><a href="https://kareplay.incsects.com/contact">İletişim</a></li>
                        <li><a href="https://kareplay.incsects.com/blog">Blog</a></li>
                      </ul>
                    </div>
        </div>

    </footer>
</body>
</html>