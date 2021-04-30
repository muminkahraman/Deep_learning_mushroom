<?php  include ("fonction.php"); ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="Bootstrap/css/bootstrap.css"  rel="stylesheet" >
  <link href="index.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

  <script src="js/index.js"></script>
  <script src="ressources/data.js"></script>
  <script src="js/anime.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
   
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-10">
        <img draggable="false" class="logo" src="ressources/image/shroom.png"/>
        <a draggable="false" class="title" href="./?accueil=on"><h1 class="display-1" style="margin-top:30px;">Mushing Learning</h1></a>
        <!--- Dropdown menu --->
      </div>
      <div class="col-1"></div>
      <div class="col-1">
        <a href="#"  data-bs-toggle="dropdown" style="float: right; height:45px;width: 45px;display:absolute;  text-decoration:none; margin-top:55px;">
          <i draggable="false" class="fas fa-bars" style="font-size:30pt; float: right; display:inline; margin-top:-2px; margin-right:15px; color: #15008f;">
          </i>
        </a>


        <ul class="dropdown-menu">
          <?php
          if ($_SERVER['REQUEST_URI'] == "/?accueil=on")
          {
            echo "
            <li class='dropdown-item'>
            <a class='modalLink' href='./?galerie=on'>Galerie</a></li>
            <li class='dropdown-item'>
            <a class='modalLink' href='./?apropos=on'>A Propos</a></li></ul>";
          }
          elseif ($_SERVER['REQUEST_URI'] == "/?apropos=on")
          {
            echo "
            <li class='dropdown-item'>
            <a class='modalLink' href='./?accueil=on'>Accueil</a></li>
            <li class='dropdown-item'>
            <a class='modalLink' href='./?galerie=on'>Galerie</a></li></ul>";
          }
          elseif ($_SERVER['REQUEST_URI'] == "/?galerie=on")
          {
            echo "
            <li class='dropdown-item'>
            <a class='modalLink' href='./?accueil=on'>Accueil</a></li>
            <li class='dropdown-item'>
            <a class='modalLink' href='./?apropos=on'>A Propos</a></li>";
          }
          else echo "<li class='dropdown-item'>
          <a class='modalLink' href='./?galerie=on'>Galerie</a></li>
          <li class='dropdown-item'>
          <a class='modalLink' href='./?apropos=on'>A Propos</a></li></ul>";
          ?>

        </div>
      </div>
    </div>
  </div>
  <!---Fin modal -->
</div>
</div>
</div>
<?php
if (get("galerie")) include("galerie.php");
elseif (get("apropos")) include("apropos.php");
elseif (get("infoMush")) include("infoMush.php");
else include("accueil.php");
?>

<footer class="navbar fixed-bottom text-center">
  <div class="col-3">
  </div>
  <div class="col-6">
    <h5>Site web conçu pour LIFPROJET.</h5>
  </div>
  <div class="col-3">
  </div>
</footer>
</body>
</html>
