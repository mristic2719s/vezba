<?php



if(isset($_POST['sub'])){
$im = $_POST['ime'];
$pre =$_POST['prezime'];
$jmbg =$_POST['jmbg'];
$jmbgdel =$_POST['jmbgdel'];


}
$servername = "localhost";
$username = "user";
$password = "sifra";
$dbname = "mydb";

$konekcija = mysqli_connect($servername, $username, $password, $dbname);

if (!$konekcija) {
  die("Konekcija neuspesna! " . mysqli_connect_error());
}

$komanda = "INSERT INTO Podaci(ime, prezime, jmbg) VALUES('$im', '$pre', '$jmbg')";
$brisanje = "DELETE FROM Podaci(jmbg) VALUES('$jmbgdel')";


if (mysqli_query($konekcija, $komanda)) { 
  echo "Uspesno ste u bazu ubacili vase podatke: <br> Ime: $im <br> Prezime: $pre <br> JMBG: $jmbg <br>";
  exit();
} else {
  echo "Ovaj JMBG vec postoji u bazi! ";
  exit();
}
if (mysqli_query($konekcija, $brisanje)) { 
    echo "Uspesno ste obrisali osobu iz baze ciji je JMBG:<br> JMBG: $jmbgdel <br>";
    exit();
  } else {
    echo "Greska: " . $brisanje . "<br>" . mysqli_error($konekcija);
    exit();
  }

mysqli_close($konekcija);



?>