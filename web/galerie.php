<?php
$servername= "localhost";
$username="logan";
$password="logan";

try {
  $conn = new PDO("mysql:host=$servername;dbname=mushroom", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<?php
if(isset($_GET['letter']) && !empty($_GET['letter'])){
  $letter = strip_tags($_GET['letter']);
}else{
  $letter = "A";
}

$alphas = range('A', 'Z');
echo '
<div style="height:50px;"></div>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">';
foreach ($alphas as $a) {
  echo '<li class="page-item"><a class="page-link" href="./?galerie=on&letter='.$a.'">'.$a.'</a></li>';
}
echo'
</ul>
</nav>';


$req= $conn->query('Select * from list_mush where mushroom like "'.$letter.'%" order by mushroom asc;');

echo "<div class='container-fluid'>";
while($data = $req->fetch())
{
  echo "<div class='row'><div class='col-3'></div> <div class='col-6 text-center'><a href='#' class='text-white fs-4 text' style='text-decoration:none;'> ".$data[0]."  </a></div> <div class='col-3'></div></div>";
}

$req=null;
$conn = null;
?>
</div>
<div style="height:50px;"></div>
