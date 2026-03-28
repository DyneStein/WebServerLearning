<?php
//okay so I am going to be writing comments for my own understanding and better typing speed
//So I'll try to utilise all four languages : js , php and html/css
$serverName = "DYENSTEIN\SQLEXPRESS02";
//yes BACKSPACE IS USED


//this is an associative array for options of connection
$options = [
   "Database"=>"EmpDeptDB",
   "Uid"=>"",
   "PWD"=>"",
   "TrustServerCertificate"=>true //TSC --- TCS
];

$connection = sqlsrv_connect($serverName, $options);
//sqlsrv_connect(name , option)

//PHP has the three equal stuff 
if($connection===false)
   {
         die(print_r(sqlsrv_errors(), true));
         // so you basically die when you get an error :)
   }


?>

<?php
//was running unconditionally so we have to wrap it up, so it only runs when 
//the form is actually submitted

//isset causes unpredictable behaviour
//if(isset($_POST["name"]))
//{

if($_SERVER["REQUEST_METHOD"]==="POST")
{


$name = $_POST["name"];
$job = $_POST["job"];
//idk I added this conversion but at this point, I am doing something wrong which is not letting me update the data
//base

//$sal = floatval($_POST["sal"]);
//$comm = floatval($_POST["comm"]); with these two the form was submitting accurately

$sal = $_POST["sal"];
$comm = $_POST["comm"];

$parameters = [
$name,
$job,
$sal,
$comm
];


$query = "INSERT INTO BONUS(ENAME,JOB,SAL,COMM) VALUES(?,?,?,?)";
$query_run = sqlsrv_query($connection,$query,$parameters);

if($query_run)
{
   header("Location: " . $_SERVER["PHP_SELF"]);
   exit();
}
else
   {
//if not there, can also cause silent errors and unpredictable behaviours
die(print_r(sqlsrv_errors(),true));


   }

}

//} isset-closer brakcet
//so this should logically run the query
?>




<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>PHP_SELF PRACTICE (WITHOUT AI)</title>
   <link rel="stylesheet" href="style.css" />

<!--Today I realised that CSS blocks goes into the head tags while js blocks go into
the body tags (just before </body>)-->

   
   </head>
   <body>
<!--
now I am not building something like logical, this is solely for practice   
now just for revising, I know that name attribute in html is for php and id attribute is for js
-->


   <form method="POST"> 
   
   <!--[IMPORTANT CONCEPT] so basically I was wondering how would this form be linked with
   php, like how it would be linked and like how my form would trigger php unlike we put js functions in the onclick type attributes
   which trigger them,.... so here the attribute of form is ACTION, so if I had my php in a 
   separate file but in the same folder than I would have done <form action="xyz.php" method="POST"> type thing
   here I am omiting action attribute which means my data after submission of the form would come to this same file.
   -->
   
    Name : <input type="text" name="name">
    job : <input type="text" name="job">
    Salary : <input type="text" name="sal">
    Commision : <input type="text" name="comm">
    <button type="submit" value="submit"> Submit </button>
    
   </form>

   <table border="1">

<tr>
      <th>NAME</th>
      <th>JOB</th>
      <th>SAL</th>
      <th>COMMISION</th>
</tr>

   <?php
   $stmt = sqlsrv_query($connection,"select * from bonus");
   while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
   {
      echo "<tr><td>" . $row['ENAME'] . "</td><td>" . $row['JOB'] . "</td><td>" . $row['SAL'] . "</td><td>" . $row['COMM'] . "</td><td></tr>";  
   }

   ?>

</table>
   <script></script>

   </body> 
</html>



