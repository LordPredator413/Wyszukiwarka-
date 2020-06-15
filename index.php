<html>
 <head>
  <meta charset="utf-8">
  <title>E-Klasa</title>
 </head>
 <style>

   div{
    height: 400px;
      width: 300px;
      background-color: rgba( 20, 240, 218, 0.66);
      border-style: solid;
      border-width: 2px;
      border-radius: 3px;
   }
   </style>
 <body>
   <center>
     <div>
 <h1>Spis Uczniów</h1>


  <table border="1">
   <tr>
     <th>PESEL</th><th>Imie</th><th>Nazwisko</th><th>Klasa</th>
   </tr>

<?php

if(isset($_POST['szukaj'])){
  $nazwa = $_POST['nazwa'];
} else {
  $nazwa = "";
}

include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM uczen WHERE nazwisko LIKE '$nazwa%' ORDER BY klasa, nazwisko"))
{
        $sql->execute();
        $sql->bind_result($pesel, $imie, $nazwisko, $klasa);

        while ($sql->fetch())
        {
                echo "<tr>
                        <td>$pesel</td>
                        <td>$imie</td>
                        <td>$nazwisko</td>
                        <td>$klasa</td>
                   </tr>";
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin: ". $baza->error );

 $baza->close();
 
?>
  </table>

  </br>
  <b>Szukaj wg. nazwiska</b>
  <form action="" method="post">
        <input type="text" placeholder="Nazwisko" name="nazwa">
        <input type="submit" name="szukaj" value="Szukaj"></button>
    </form>
</div>
</center>
 </body>
</html>