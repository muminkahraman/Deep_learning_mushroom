<div class="container-fluid">
  <div class="row mx-auto mt-3" style="width:40%;">
    <input class="bar" id="search" onkeyup="mushSearch()" type="text" placeholder=" Search" />
  </div>
</div>


<?php

if(isset($_GET['page']) && !empty($_GET['page']))
{
  $currentPage = (int) strip_tags($_GET['page']);
}
else
{
  $currentPage = 1;
}


$string = file_get_contents("ressources/names/champName.json");
$json_a = json_decode($string, true);

$arr = [];

foreach ($json_a[mush] as $key => $value) {
  array_push($arr, $value[Name]);
}


sort($arr);

$size = count($json_a[mush]);

$perPage = 4000;

$pages = ceil($size/ $perPage);

$premier = ($currentPage* $perPage) - $perPage;

$limit=3;



echo '
<div class="container-fluid grid px-4 mt-5" >
  <div class="row gy-5" id="listMush"> ';

for ($i=$premier; $i < $size; $i++) {
  echo '
    <div class="col-2" >
      <a href="#" class="border">IMG</a>
        <div><h7>';  echo $arr[$i];
        echo '</h7>
        </div>
    </div>';
};
?>
</div>
</div>
