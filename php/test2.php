<?php 
function generatepass() {
    $length = 8;
    $char = '0123456789@$_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $l = strlen($char);
    $pass = '';
    for ($i = 0; $i < $length; $i++) {
        $pass .= $char[rand(0, $l - 1)];
    }
    return $pass;
}
?>

