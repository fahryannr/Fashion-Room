<?php
    $con = mysqli_connect("localhost","root","","toko_online");

    if(mysqli_connect_errno()){
        print "gagal konek: ". mysqli_connect_error();
        exit;
    }

?>