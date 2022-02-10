<?php
    $file = $_POST['file'];
    unlink('./'.$file);
    echo $file;
?>