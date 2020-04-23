<?php require_once __DIR__ . "/vendor/autoload.php"; 
$collection = (new MongoDB\Client)->lab2->lessons;?>

<html>
   <head>
      <meta charset="utf-8">
      <title>lab2</title>
   </head>
   <body>
      <form action="LaboratoryPage.php" method="POST">
         <b>Laboratory schedule</b>
         <select name="group">
         <?php
            var_dump($document['laboratory']);
            $cursorLab = $collection->distinct("groups");
            foreach ($cursorLab as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <input type="submit" name="send" value="OPEN">
      </form>
      

      <form action="LecturePage.php" method="POST">
         <b>Lecture schedule</b>
         <select name="teacher">
         <?php
            $cursorTeacher = $collection->distinct("teacher");
            foreach ($cursorTeacher as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <select name="disciple">
         <?php
            $cursorDisciple = $collection->distinct("disciple");
            foreach ($cursorDisciple as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <input type="submit" name="send" value="OPEN">
      </form>


      <form action="AuditoriumPage.php" method="POST">
         <b>Auditorium schedule</b>
         <select name="auditorium">
         <?php
            $cursorAud = $collection->distinct("auditorium");
            foreach ($cursorAud as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <input type="submit" name="send" value="OPEN">
      </form>
   </body>
</html>