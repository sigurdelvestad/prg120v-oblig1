<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes
/*  Brukernavn velges fra en dynamisk listeboks
/*  Programmet sletter den valgte studenten
*/
?>
<meta charset="UTF-8">
<script src="funksjoner.js"> </script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  Student
  <select name="brukernavn" id="brukernavn" required>
    <option value="">velg student</option>
    <?php include("dynamiske-funksjoner.php"); listeboksBrukernavn(); ?>
  </select> <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php
  if (isset($_POST ["slettStudentKnapp"]))
    {
      $brukernavn=$_POST ["brukernavn"];

      if (!$brukernavn)
        {
          print ("Student er ikke valgt");
        }
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
            /* SQL-setning sendt til database-serveren */

          print ("F&oslash;lgende student er n&aring; slettet: $brukernavn");
        }
    }
?>
