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
    <h1 class="text-center">Kayıt İşlemleri</h1>

    <?php
    if (isset($_GET['durum'])) {
        if ($_GET['durum'] == "ok") {
           // echo "başarılı";
        } else {
            echo "başarısız";
        }
    }
    ?>

    <div class="container">
        <form action="islem.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control-md"  name="ad" placeholder="Adınızı girin">
            </div>
            <div class="form-group">
                <input type="text" class="form-control-md" name="soyad" placeholder="Soyadınızı girin">
            </div>
            <div class="form-group">
                <input type="email" class="form-control-md"  name="mail" placeholder="Emailinizi girin">
            </div>
            <div class="form-group">
                <input type="text" class="form-control-md" name="yas" placeholder="Yaşınızı girin">
            </div>
            <button type="submit" class="btn btn-dark" name="insertislem">Gönder</button>
        </form>
    </div>
    <br>
    <h1 class="text-center">Kayıtlar Listesi</h1>
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
    <table style="width:60%" class="table table-striped">
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
        $bilgilerimsor = $db->prepare("SELECT * FROM bilgilerim");
        $bilgilerimsor->execute();
       
        $say = 0;
        while ($bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC)) {
            $say++
             ?>
            <tr>
                <td><?php echo $say ?></td>
                <td><?php echo $bilgilerimcek['id'] ?></td>
                <td><?php echo $bilgilerimcek['ad'] ?></td>
                <td><?php echo $bilgilerimcek['soyad'] ?></td>
                <td><?php echo $bilgilerimcek['mail'] ?></td>
                <td><?php echo $bilgilerimcek['yas'] ?></td>
                <td style="text-align:center;"><a href="duzenle.php?id=<?php echo $bilgilerimcek['id']; ?>"><button class="btn btn-success">Düzenle</button></a></td>
                <td style="text-align:center;"><a href="islem.php?id=<?php echo $bilgilerimcek['id']; ?>&bilgilerimsil=ok"><button class="btn btn-danger">Sil</button></a></td>
            </tr>
        <?php }   ?>
    </table>
</body>

</html>