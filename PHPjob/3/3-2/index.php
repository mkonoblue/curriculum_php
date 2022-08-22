<?php
//単価はりんごが100円、みかんが150円、ももが500円と想定
$fruits = ["りんご" => 100,"みかん" => 150,"もも" => 500];

//それぞれの個数はりんごが3個、みかんが1個、ももが6個と想定
$kosuu = [3,1,6];


//合計を計算する関数
function getGoukei($tanka,$kosuu){
    return $tanka * $kosuu;
}


$i = 0;
foreach ($fruits as $key => $tanka){
    $goukei =  getGoukei($tanka,$kosuu[$i]);
    echo $key."は".$goukei."円です.";
    echo "<br>";
    $i++;
}

?>