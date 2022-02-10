<?php
    $file = str_replace('*','&', $_POST['file']);
    unlink('./'.$file);
    echo $file;
?>