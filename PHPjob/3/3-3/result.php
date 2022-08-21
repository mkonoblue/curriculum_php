<?php

echo date("Y/m/d",time())."の運勢は、<br>";
 
$number = $_POST['inputNumber'];
$random = mt_rand(1,10);
$uranai = substr($number,$random,1);

echo "選ばれた数字は$uranai!<br>";

switch ($uranai){
    case "0":
    print "凶です";
    break;
    
    case "1":case "2":case "3":
    print "小吉です";
    break;

    case "4":case "5":case "6":
    print "中吉です";
    break;    
    
    case "7":case "8":
    print "吉です";
    break;
    
    case "9":
    print "大吉です";
    break;

    default:
    print "半角で0～9までの数字の羅列を10桁以上入力してください";
    break;    

}
echo "<br>";
