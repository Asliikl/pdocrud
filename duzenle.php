<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
    <link rel="stylesheet" href="style.css">
    <!-- bootsrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>

<?php
if (isset($_GET['id'])) {
    if (isset($_GET['durum']) && $_GET['durum'] == "ok") {
        echo "";
    } else {
        echo "başarısız";
    }
} else {
     die('Hatalı');
}
?>



    <?php
    $bilgilerimsor = $db->prepare("SELECT * FROM bilgilerim where id=:id");
    $bilgilerimsor->execute(array(
        'id' => $_GET['id']
    ));
    $bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC);

    if(!$bilgilerimcek){
        die('hatali id');
    }
    
    ?>

    <h1 class="text-center mb-4">Düzenleme İşlemleri</h1>

    <div class="container">
        <form action="islem.php" method="POST" class="custom-form">
            <div class="form-group">
                <input type="text" required="" class="form-control-md" name="ad" value="<?php echo $bilgilerimcek['ad'] ?>">
            </div>
            <div class="form-group">
                <input type="text" required="" class="form-control-md" name="soyad" value="<?php echo $bilgilerimcek['soyad'] ?>">
            </div>
            <div class="form-group">
                <input type="email" required="" class="form-control-md" name="mail" value="<?php echo $bilgilerimcek['mail'] ?>">
            </div>
            <div class="form-group">
                <input type="text" required="" class="form-control-md" name="yas" value="<?php echo $bilgilerimcek['yas'] ?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" class="form-control-md" value="<?php echo $bilgilerimcek['id'] ?>">
            </div>
            <button type="submit" class="btn btn-dark" name="updateislemi">Formu Düzenle</button>
        </form>
    </div>
</body>

</html>