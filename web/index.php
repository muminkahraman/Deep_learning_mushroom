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
  <script src="js/anime.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>


</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-8">
        <a class="title" href="./?accueil=on"><h1 class="display-1">ChampiScan</h1></a>
        <!--- Dropdown menu --->
      </div>
      <div class="col-3"></div>
      <div class="col-1">
        <a href="#"  data-bs-toggle="dropdown" aria-expanded="false" style="float: right; height:75px;display:absolute;  text-decoration:none">
          <i class="fas fa-bars" style="font-size:30pt; float: right; display:inline; margin-top:40px; margin-right:15px; color: #15008f;">
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
elseif (get("infoChampi")) include("infoChampi.php");
else include("accueil.php");
?>


<footer class="footer">
  <div class="container-fluid">
    <h5>Projet sur le Machine Learning. Site web créé par Logan Moriniere.</h5>
  </div>
</footer>
</body>
</html>
