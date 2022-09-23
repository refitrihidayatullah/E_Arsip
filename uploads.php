<?php
function upload()
{
    $namefile = $_FILES['file']['name'];
    $sizefile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpname = $_FILES['file']['tmp_name'];

    // cek data upload format valid [jpg,jpeg,png,pdf]
    $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
    $eksfile = explode('.', $namefile);
    $eksfile = strtolower(end($eksfile));

    if ((!in_array($eksfile, $eksfilevalid)) && $sizefile > 1000000) {
        echo "<script> alert('format file atau ukuran file tidak sesuai !!') </script>";
        return false;
    }

    $namefilenew = uniqid();
    $namefilenew .= '.';
    $namefilenew .= $eksfile;

    move_uploaded_file($tmpname, 'file/' . $namefilenew);
    return $namefilenew;
}
