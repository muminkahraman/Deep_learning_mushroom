<?php  include ("fonction.php"); ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="Bootstrap/css/bootstrap.min.css"  rel="stylesheet" >
  <link href="index.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

  <script src="index.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>


</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a class="title" href="./?accueil=on"><h1 style="font-size:60pt;display:inline;">ChampiScan</h1></a>
        <!--- Modal --->
        <i class="fas fa-bars" style="font-size:30pt; float: right; display:inline; margin-top:40px; margin-right:15px; color: #15008f;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="float:right;">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-body" style="color:black; text-align: center;">
                <a class="modalLink" href="./?galerie=on">Galerie</a></br>
                <a class="modalLink" href="./?apropos=on">A Propos</a>
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


</body>
</html>
