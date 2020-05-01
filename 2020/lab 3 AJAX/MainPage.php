<?php include 'Connect.php'; ?>
<html>
   <head>
      <meta charset="utf-8">
      <title>Shedule</title>
   </head>
   <body>
      <form action="GroupQuery.php" method="POST">
         <b>Group schedule</b>
         <select name="group">
         <?php
            $qGroup = $dbh -> query('SELECT `ID_Groups`, `title` from `groups`');
            while($rowG = $qGroup ->fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowG['ID_Groups'],'">',$rowG['title'],
                  '</option>';   
            }
            ?>
         </select>
         <input type="submit" name="send" value="OPEN">
      </form>
      <form action="TeacherQuery.php" method="POST">
         <b>Teacher schedule</b>
         <select name="teacher">';
         <?php
            $qTeacher = $dbh -> query('SELECT `ID_Teacher`, `name` FROM `teacher`');
            while($rowT = $qTeacher ->fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowT['ID_Teacher'],'">',$rowT['name'],
                  '</option>';   
            }
            ?>
         </select>
         <input type="submit" name="send" value="OPEN">
      </form>
      <form action="AuditoriumQuery.php" method="POST">
         <b>Auditorium schedule</b>
         <select name="aud">';
         <?php
            $qAuditorium = $dbh -> query('SELECT DISTINCT `auditorium` FROM `lesson`');
            while($rowA = $qAuditorium ->fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowA['auditorium'],'">',$rowA['auditorium'],
                  '</option>';   
            }
         ?>
         </select>
         <input type="submit" name="send" value="OPEN">
      </form>

      <form action="Add.php" method="POST">
         <b>Add new practical lesson:</b><br><br>
         Input day of week<br>
         <input type="text" name="week" value="Saturday"><br>
         Input number of lesson<br>
         <input type="number" min="1" name="numberL" value="1"><br>
         Input number of auditorium<br> 
         <input type="text" name="audN" value="100"><br>
         Input name of disciple<br> 
         <input type="text" name="disciple" value="Math"><br><br>
         <b>Choose teacher</b>
         <select name="teacher">';
         <?php
            $qTeacher = $dbh -> query('SELECT `ID_Teacher`, `name` FROM `teacher`');
            while($rowT = $qTeacher -> fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowT['ID_Teacher'],'">',$rowT['name'],
                  '</option>';   
            }
         ?>

         </select><br><br>
         <b>Choose group</b>
         <select name="group">';
         <?php    $qGroup = $dbh -> query('select `ID_Groups`, `title` from `groups`');
            while($rowG = $qGroup ->fetch(PDO::FETCH_ASSOC))
            {    
             echo'    <option value="',
            $rowG['ID_Groups'],'">',$rowG['title'],
            '</option>';   
            }
            
            ?></select>
         <input type="submit" name="send" value="ADD">
      </form>
   </body>
</html>