<?php
function get($attr,$mult=false)
{
    $val="";
    if (isset($_GET[$attr]) && !empty($_GET[$attr]))        $val=preg_replace("/\'/", "\'", $_GET[$attr]);
    elseif (isset($_GET[$attr]))                            $val=preg_replace("/\'/", "\'", $_GET[$attr]);
    elseif (isset($_POST[$attr]) && !empty($_POST[$attr]))  $val=$_POST[$attr];
    elseif (isset($_POST[$attr]))                           $val=$_POST[$attr];
    return                                                  $val;
}
?>
