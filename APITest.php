<?

//Variables for the user's selected filters

$nation = $_GET["nationS"];
$tier = $_GET["tierS"];
$type = $_GET["typeS"];


//Variables for the user's information

$first = $_GET["etuN"];
$last = $_GET["sukuN"];
$user = $_GET["kayttajaN"];







//Variables for getting the database used in the project

$palvelin = "fdb28.awardspace.net";
$kayttaja = "3597341_sqlopiskelu";
$salasana = "AcXz.7447123";
$tietokanta = "3597341_sqlopiskelu";


//Linking to the database

$link = mysqli_connect($palvelin, $kayttaja, $salasana, $tietokanta);


//Checking if the connection to the database was successfull

if (mysqli_connect_error()){
  die("Tietokanta ei vastannut");
}


//Inserting the user's information into the database

$talletus = "INSERT INTO WOTAccountDetails (firstName, lastName, userName) VALUES ('$first', '$last', '$user')";


//If the insertion of the user's information to the database was successfull, say: "Uudet tiedot on päivitetty", 
//otherwise say an error message

if (mysqli_query($link, $talletus))
{
  echo "Uudet tiedot on päivitetty";
}
else
{
  echo "Virhe:".$talletus."<br>".mysqli_error($link);
}


//Getting all the information from the used database and setting it into a variable

$kysely = 'SELECT * FROM WOTAccountDetails';

$vastaus = mysqli_query($link,$kysely);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    
    <!-- Linking the APITestResult.css file to this file-->
    <link rel="stylesheet" href="APITestResult.css">
    
    <!-- Linking the APITest.js file to this file and activate JQuery on that specified script -->
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="APITest.js"></script>
  </head>
  <body>
  
    <header>
    
      <!-- The places to store the users selected search filters -->
      
      <input type="hidden" id="nationI" value="<?php echo $nation; ?>"><br>
      <input type="hidden" id="tierI" value="<?php echo $tier; ?>"><br>
      <input type="hidden" id="typeI" value="<?php echo $type; ?>"><br>
      
      
      <!-- Div for the user's search results -->
      <div class="resultD" id="resultDiv">
      
      </div>
    </header>
  </body>
</html>
