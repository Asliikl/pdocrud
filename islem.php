<?php
require_once 'baglan.php';

if(isset($_POST['insertislem'])){

    $kaydet=$db->prepare("INSERT INTO bilgilerim SET 
    ad=:ad, #sağdaki takma isimdir
    soyad=:soyad,
    mail=:mail,
    yas=:yas
    ");
    $insert = $kaydet->execute(array(
        'ad' => $_POST['ad'],
        'soyad' => $_POST['soyad'],
        'mail' => $_POST['mail'],
        'yas' => $_POST['yas']
    ));

    if($insert){
        header("Location:index.php?durum=ok");
        exit;
    }
    else{
        header("Location:index.php?durum=no");
        exit;
    }
}


if(isset($_POST['updateislemi'])){

    $id=$_POST['id'];
    
    $kaydet=$db->prepare("UPDATE bilgilerim SET 
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

    if($insert){
        header("Location:duzenle.php?durum=ok&id=$id");
        exit;
    }
    else{
        header("Location:duzenle.php?durum=no&id=$id");
        exit;
    }
}

if($_GET['bilgilerimsil']=="ok"){
    $sil=$db->prepare("DELETE from bilgilerim where id=:id");
    $kontrol=$sil->execute(array(
        'id'=>$_GET['id']
    ));
    
    if($kontrol){
        header("Location:index.php?durum=ok");
        exit;
    }
    else{
        header("Location:index.php?durum=no");
        exit;
    }
}

?>
