<?php
$testfile = "test.txt";
$contents = "こんにちは！！！\n";

if(is_writable($testfile)){

    $fp = fopen($testfile,"a");

    fwrite($fp,$contents);

    fclose($fp);

    echo "finish writing!!";
}else{
    echo "not writable!!!!!!";
    exit;

}

$testfile = "test2.txt";

if(is_readable($testfile)){

    $fp = fopen($testfile,"r");

    while($line=fgets($fp)){
        echo $line.'<br>';
    }

    fclose($fp);

    echo "finish reading!!";
}else{
    echo "not writable!!!!!!";
    exit;

}
