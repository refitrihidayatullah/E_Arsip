<?php

@$halaman = $_GET["halaman"];

if ($halaman == "departement") {
    include("views/v_departement.php");
} elseif ($halaman == "pengirim_surat") {
    include("views/v_pengirim_surat.php");
} elseif ($halaman == "arsip_surat") {
    if (@$_GET['hal'] == "tambaharsip" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "delete") {
        include("views/arsip/v_form_arsip.php");
    } else {
        include("views/arsip/v_arsip_surat.php");
    }
} else {
    include("views/v_beranda.php");
}
