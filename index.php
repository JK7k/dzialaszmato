<!DOCTYPE html>
<html>
  <head>
    <title>Formularz dodawania lekcji</title>
  </head>
  <body>
  <?php
            $polaczenie=mysqli_connect('localhost','root','','4tie');
            if ($polaczenie) 
               {
                echo "Połączyliśmy się z bazą danych";
                $zapytanie="SELECT * FROM dane";
                $wynik=mysqli_query($polaczenie,$zapytanie);
                while($wiersz=mysqli_fetch_array($wynik)){
                    $imie[]= $wiersz['imie'];
                    $nazwisko[]= $wiersz['nazwisko'];
                    $iddane[]=$wiersz['id'];                    
                
                }
                $zapytanie="SELECT * FROM przedmiot";
                $wynik=mysqli_query($polaczenie,$zapytanie);
                while($wiersz=mysqli_fetch_array($wynik)){
                    $przedmioty[]= $wiersz['przedmiot'];
                    $idprzedmiot[]=$wiersz['ID'];
                }
               }
    
    ?>

<form method="POST">
            <label for="idprzedmiot">Wybierz przedmiot</label>
            <select name="idprzedmiot">
                <?php
                for ($x=0;$x<count($przedmioty);$x++){
                    echo "<option value=$idprzedmiot[$x]>$przedmioty[$x]</option>";
                }
                   
 ?>
    <h1>Dodaj nową lekcję</h1>
    <form method="post" action="zapisz-lekcje.php">
      <label for="przedmiot">Przedmiot:</label>
      <select id="przedmiot" name="przedmiot">
        <option value="matematyka">Matematyka</option>
        <option value="polski">Język polski</option>
        <option value="angielski">Język angielski</option>
      </select>
      <br>
      <label for="nauczyciel">Nauczyciel:</label>
      <select id="nauczyciel" name="nauczyciel">
        <option value="jan-kowalski">Jan Kowalski</option>
        <option value="anna-nowak">Anna Nowak</option>
        <option value="piotr-zielinski">Piotr Zieliński</option>
      </select>
      <br>
      <label for="data">Data:</label>
      <input type="date" id="data" name="data">
      <br>
      <label for="numer-lekcji">Numer lekcji:</label>
      <select id="numer-lekcji" name="numer-lekcji">
        <?php for ($i = 0; $i <= 13; $i++) { ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
      </select>
      <br>
      <label for="temat">Temat:</label>
      <input type="text" id="temat" name="temat">
      <br>
      <button type="submit">Zapisz</button>
    </form>
  </body>
    <footer>
        KACPER JAWOROWSKi
    </footer>
</html>