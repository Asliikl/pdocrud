<?php
require_once 'baglan.php';


if (isset($_POST['insertislem'])) {

    if (!isset($_POST['ad']) || !isset($_POST['soyad']) || !isset($_POST['mail'])) {
        header("Location: index.php?hata=yanlis-giris");
        exit;
    }

   if (isset($_POST['yas'])) {
        $yas = $_POST['yas']!='' ? $_POST['yas'] : '19';
    } else {
        $yas = '19';
    } 
    
    $kaydet = $db->prepare("INSERT INTO bilgilerim SET 
    ad = :ad,
    soyad = :soyad,
    mail = :mail,
    yas = :yas
    ");

    $insert = $kaydet->execute(array(
        'ad' => $_POST['ad'],
        'soyad' => $_POST['soyad'],
        'mail' => $_POST['mail'],
        'yas' => $yas

    ));

    if ($insert) {
        header("Location: index.php?durum=ok");
        exit;
    } else {
        header("Location: index.php?durum=no");
        exit;
    }
}


 // 'yas' => !is_null(($_POST['yas']))&& ($_POST['yas']) ? $_POST['yas'] : 19


if (isset($_POST['updateislemi'])) {

    $id = $_POST['id'];

    $kaydet = $db->prepare("UPDATE bilgilerim SET 
    ad=:ad,
    soyad=:soyad,
    mail=:mail,
    yas=:yas
    WHERE id=:id
    ");
    $insert = $kaydet->execute(array(
        'ad' => $_POST['ad'],
        'soyad' => $_POST['soyad'],
        'mail' => $_POST['mail'],
        'yas' => $_POST['yas'],
        'id' => $_POST['id']
    ));

    if ($insert) {
        header("Location:index.php?durum=ok&id=$id");
        exit;
    } else {
        header("Location:duzenle.php?durum=no&id=$id");
        exit;
    }
}

if ($_GET['bilgilerimsil'] == "ok") {
    $sil = $db->prepare("DELETE from bilgilerim where id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['id']
    ));

    if ($kontrol) {
        header("Location:index.php?durum=ok");
        exit;
    } else {
        header("Location:index.php?durum=no");
        exit;
    }
}
