<?php
function rdstr()
{
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $l = strlen($char);
    $str = '';
    for ($i = 0; $i < 10; $i++) {
        $str .= $char[rand(0, $l - 1)];
    }
    return $str;
}
$x =  rdstr();
echo $x;
?>
