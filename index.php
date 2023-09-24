<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>

<h1>PDO Kayıt İşlemleri</h1>
<hr>
<?php
if (isset($_GET['durum'])) {
    if ($_GET['durum'] == "ok") {
        echo "başarılı";
    } else {
        echo "başarısız";
    }
} 
?>
<form action="islem.php" method="POST">

    <input type="text" required="" name="ad" placeholder="Adınızı girin">
    <input type="text" required="" name="soyad" placeholder="SoyAdınızı girin">
    <input type="email" required="" name="mail" placeholder="Emailinizi girin">
    <input type="text" required="" name="yas" placeholder="Yaşınızı girin">
    <button type="submit" name="insertislem">Gönder</button>
</form>

<hr>
<h4>Kayıtlar Listesi</h4>
<br>
<?php
//SELECT İŞLEMİ
/* $bilgilerimsor=$db->prepare("SELECT * FROM bilgilerim");
 $bilgilerimsor->execute(); 
 $bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
*/

// $bilgilerimsor=$db->prepare("SELECT * FROM bilgilerim");
// $bilgilerimsor->execute();

// while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)){
//     echo $bilgilerimcek['ad'];
// }

?>

<table style="width:60%" border="1">
    <tr>
        <th>Sıra No</th>
        <th>Id</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>Email</th>
        <th>Yaş</th>
        <th width="50">İşlemler</th>
        <th width="50">İşlemler</th>
    </tr>
        <?php
        $bilgilerimsor=$db->prepare("SELECT * FROM bilgilerim");
        $bilgilerimsor->execute();
        $say=0;
        while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)){  $say++?>
    <tr>
        <td><?php echo $say ?></td>
        <td><?php echo $bilgilerimcek['id']?></td>
        <td><?php echo $bilgilerimcek['ad']?></td>
        <td><?php echo $bilgilerimcek['soyad']?></td>
        <td><?php echo $bilgilerimcek['mail']?></td>
        <td><?php echo $bilgilerimcek['yas']?></td>
        <td style="text-align:center;"><a href="duzenle.php?id=<?php echo $bilgilerimcek['id']; ?>"><button>Düzenle</button></a></td>
        <td style="text-align:center;"><a href="islem.php?id=<?php echo $bilgilerimcek['id']; ?>&bilgilerimsil=ok"><button>Sil</button></a></td>
      </tr>
    <?php } ?>
</table>
    
</body>
</html>