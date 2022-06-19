<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="icon" href="images/IkonaZaStranicu.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Yusei+Magic&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b05e340512.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    
        include 'connect.php';
        
        if (isset($_POST['submit'])){
            $naslov = $_POST['naslov'];
            $sazetak = $_POST['sazetak'];
            $tekst = $_POST['tekst'];
            $kategorija = $_POST['kategorija'];
            $slika = $_FILES['slika']['name'];
            $date = date('d.m.Y');
            if (isset($_POST['arhiva'])){
                $arhiva = 1;
            }
            else{
                $arhiva = 0;
            }
        }
          
        $target_dir = 'Slike/'.$slika;
        move_uploaded_file($_FILES['slika']['tmp_name'], $target_dir);

        $query = "INSERT INTO vijesti (naslov, sazetak, tekst, slika, kategorija, datum, arhiva) VALUES ('$naslov', '$sazetak', '$tekst', '$slika', '$kategorija', '$date', '$arhiva')";

        $result = mysqli_query($dbc, $query) or die('Error querying database');

        mysqli_close($dbc);
    ?>

    
    <header>
    <a href="Naslovnica.html"><i class="fas fa-arrow-alt-circle-left fa-4x"></i></a>
    </header>
    <center><main>
        <div>
            <div>
                <h1><?php echo $kategorija;?></h1>
            </div>  
        </div>
        <div>
            <h2><?php echo $naslov;?></h2><br>
            <section>
                <article>
                    <?php echo "<img src='Slike/$slika'>";?>
                    <br><br><p><?php echo $sazetak;?></p>
                </article>
            </section>
        </div>
    </main></center>

    <footer>
    <footer><h4>Tin Lulić</h4><h5>0246094240</h5></footer>
</body>
</html>