<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css" type="text/css">
</head>
<body>
    <div id="bannerl">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>
    <div id="bannerr">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <a href="https://terapiasokami.pl/"><li>soki</li></a>
        </ol>
    </div>
    <div id="content">
    <?php
         $conn=mysqli_connect("localhost","root","","dane2");
         $q=mysqli_query($conn,'SELECT `nazwa`,`ilosc`,`opis`,`cena`,`zdjecie` FROM `produkty` WHERE `Rodzaje_id`=1 OR `Rodzaje_id`=2;');
         while($row=mysqli_fetch_array($q))
         {
            echo "<div id='pro'>";
            echo "<img src=".$row['zdjecie']." alt='warzywniak'>"."<br>";
            echo "<h5>".$row['nazwa']."</h5>";
            echo "<p>opis: ".$row['opis']."</p>";
            echo "<p>na stanie: ".$row['ilosc']."</p>"."<br>";
            echo "<h2>".$row['cena']." zł</h2>";
            echo "</div>";
         }
         mysqli_close($conn);
        ?>
    </div>
    <div id="stopka">
    <form method="post" action="">
            Nazwa: <input type="text" name="nazwa">
            Cena: <input type="text" name="cena">
            <input type="submit" value="Dodaj produkt">
        </form>
        Stronę wykonał: 00000000000
        <?php
         $conn=mysqli_connect("localhost","root","","dane2");
         if((isset($_POST['nazwa']))&&(isset($_POST['cena'])))
         {
            if(($_POST['nazwa']=="")||($_POST['cena']==""))
            {
               mysqli_close($conn);
            }
            else
            {
               $naz=$_POST["nazwa"];
               $cen=$_POST["cena"];
               $z=mysqli_query($conn,"INSERT INTO `produkty` VALUES (NULL, '1', '4', '$naz', '10', 'puste pole', '$cen', 'owoce.jpg')");
               mysqli_close($conn);
            }
         }
        ?>
    </div>
</body>
</html>