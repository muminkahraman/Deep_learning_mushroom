<div class="container-fluid grid px-4">
  <div class="row gy-5">

    <?php

    if(isset($_GET['page']) && !empty($_GET['page']))
    {
      $currentPage = (int) strip_tags($_GET['page']);
    }
    else
    {
      $currentPage = 1;
    }

    echo (int)strip_tags($_GET['page']);

    $string = file_get_contents("ressources/names/champName.json");
    $json_a = json_decode($string, true);

    $size = count($json_a[mush]);

    $perPage = 100;

    $pages = ceil($size/ $perPage);

    $premier = ($currentPage* $perPage) - $perPage;
    /*
    for ($i=$premier; $i < $perPage; $i++) {
    echo '
    <div class="col-3">
    <div class="p-3 border bg-light">';
    echo $json_a[mush][$i][Name];
    echo '</div>
    </div>';
  };*/
  ?>
</div>
</div>
