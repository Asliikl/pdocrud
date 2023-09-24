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

<?php
$bilgilerimsor=$db->prepare("SELECT * FROM bilgilerim where id=:id");
$bilgilerimsor->execute(array(
    'id'=>$_GET['id']
)); 
$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
?>

<hr>
<h4>Kayıt Düzenleme</h4>
<br>

<form action="islem.php" method="POST">
    <input type="text" required="" name="ad" value="<?php echo $bilgilerimcek['ad'] ?>">
    <input type="text" required="" name="soyad" value="<?php echo $bilgilerimcek['soyad'] ?>">
    <input type="email" required="" name="mail" value="<?php echo $bilgilerimcek['mail'] ?>">
    <input type="text" required="" name="yas" value="<?php echo $bilgilerimcek['yas'] ?>">
    <input type="hidden" name="id" value="<?php echo $bilgilerimcek['id'] ?>">
    <button type="submit" name="updateislemi">Formu Düzenle</button>
</form>




</body>
</html>