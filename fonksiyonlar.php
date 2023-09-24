<?php

// $ad='aslihan';
// $soyad='ikiel';

// echo $ad." ".$soyad;

/* function topla($sayi1,$sayi2){
    return $sayi1+$sayi2;
}
echo topla(20,10);
*/

/*
$b=10;
function ekle($a){
    global $b; //b dışardan geldiği için
    return $a+$b;
}
echo ekle(10);
*/
/*
function yaz($ad,$soyad="soy ad girilmedi!"){ //varsayılan değer girilebilir 
    return $ad." ".$soyad;
}
echo yaz("aslıhan","ikiel");
*/

/* recursive
$sabit=1;
function faktoriyel($a){
    global $sabit;

    if($a>1){
        $sabit=$sabit*$a;
        $a--;
        faktoriyel($a);
    }
    return $sabit;
}
echo faktoriyel(4);
*/

/*fonk var mı
function yaz($a){
    return $a;
}

if(function_exists("yaz")){
    echo "fonk var";
}
else{
    echo "fonk yok";
}
*/

/*
$yaz=get_defined_functions();
echo "<pre>";
print_r($yaz);
echo "<br>";
*/

//SESSİON OLUŞTURMA 
/*
session_start();
$_SESSION['adsoyad']="asliii";

echo $_SESSION['adsoyad'];
*/
//cookie
/*
$adsoyad="asli ikiel";
setcookie("adsoyad",$adsoyad,time()+3600); //1saat
echo $_COOKIE["adsoyad"];
*/
//cokie silme
/*
setcookie("adsoyad","",strtotime("-1 week")); 
*/
?>