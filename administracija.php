<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <title>Naslovnica</title>
        <meta charset="utf-8"/>
        <meta name="keywords" content="planeti,Sunčev sustav,zanimljivosti">
        <meta name="description" content="opisi planeta sunčevog sustava"/>
        <meta name="author" content="Tin Lulić">
        <meta name="generator" content="Visual Studio Code">
        <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
        <link rel="icon" href="images/IkonaZaStranicu.ico" type="image/x-icon">
        <link rel="stylesheet" href="administracija.css" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Yusei+Magic&display=swap" rel="stylesheet">
        <script
src="https://kit.fontawesome.com/b05e340512.js"
crossorigin="anonymous"></script>
    </head>
    <body>
        <a href="Naslovnica.html"><i id="strelica" class="fas fa-arrow-alt-circle-left fa-4x"></i></a>

    <main>
        
        <?php

            include 'connect.php';
            define ('PATH', 'Slike/');
            $query = "SELECT * FROM vijesti";

            $result = mysqli_query($dbc, $query);

            while($row = mysqli_fetch_array($result)){

                

                echo '<div>';
                echo '<center><h3>Clanak '.$row['id'].'</h3></center><br>';
                echo 
                '<style>
                textarea{
                    background-color: white;
                }
                
                select{
                    background-color: white;
                }
                
                input{
                    background-color: white;
                    height: 30px;
                    border-radius: 10px;
                    width: 200px;
                }
                
                textarea{
                    border-radius: 10px;
                }
                
                form{
                    margin: 0 auto;
                    text-align: center;
                    font-family: \'Yusei Magic\', sans-serif;
                }
                </style>
                <center><form name="forma_vijesti" action="" method="get" enctype="multipart/form-data">  
                    <label for="naslov">Unesite naslov vijesti:</label><br>
                    <input type="text" name="naslov" id="naslov" value="'.$row['naslov'].'"><br><br>
                    <label for="sazetak">Unesite kratki sazetak:</label><br>
                    <textarea name="sazetak" id="sazetak" cols="30" rows="10" value="">'.$row['sazetak'].'</textarea><br><br>
                    <label for="tekst">Unesite tekst clanka:</label><br>
                    <textarea name="tekst" id="tekst" cols="30" rows="10">'.$row['tekst'].'</textarea><br><br>
                    <label for="kategorija">Odaberite kategoriju:</label><br>
                    <select name="kategorija" id="kategorija"></center>
                    <option value="o" disabled selected>Molimo izaberite planet</option>
                <option value="1">Zemlja</option>
                <option value="2">Mars</option>
                <option value="3">Venera</option>
                <option value="4">Jupiter</option>
                <option value="5">Saturn</option>
                <option value="6">Neptun</option>
                <option value="7">Merkur</option>
                <option value="8">Uran</option>';
                    echo'
                    </select><br>
                    <br>
                    <label>Odaberite sliku</label>
                    <input type="file" name="slika"><br>
                    <img src="'.PATH.$row['slika'].'" width=100px><br>
                    <label for="arhiva">Zelite li arhivirati vijest</label> ';
                    if($row['arhiva'] == 0){
                        echo '<input type="checkbox" name="arhiva" id="arhiva"><br>';
                    }else{
                        echo '<input type="checkbox" name="arhiva" id="arhiva" checked><br>';
                    }
                    echo 
                    '<input type="hidden" name="id" value="'.$row['id'].'">
                    <input type="submit" name="update" value="Izmijeni">
                    <input type="submit" name="delete" value="Izbrisi">
                    </form>';
                echo '</div>';
                echo '<hr>';
            }

            $naslov = $_GET['naslov'];
            $sazetak = $_GET['sazetak'];
            $tekst = $_GET['tekst'];
            $kategorija = $_GET['kategorija'];
            $slika = $_GET['slika'];
            $date = date('d.m.Y');
            if (isset($_GET['arhiva'])){
                $arhiva = 1;
            }else{
                $arhiva = 0;
            }
            $id = $_GET['id'];
            if(isset($_GET['update'])){
                if($_GET['slika'] == ""){
                    $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst', kategorija='$kategorija', datum='$date', arhiva='$arhiva' WHERE id='$id'";
                }else{
                    $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst', kategorija='$kategorija', slika='$slika', datum='$date', arhiva='$arhiva' WHERE id='$id'";
                }
                $result = mysqli_query($dbc, $query);
            }

            if(isset($_GET['delete'])){
                $query = "DELETE FROM vijesti WHERE id=$id";
                $result = mysqli_query($dbc, $query);
            }
            
            mysqli_close($dbc);
        ?>

    </main>

    <footer><h4>Tin Lulić</h4><h5>0246094240</h5></footer>
   

</body>
</html>

