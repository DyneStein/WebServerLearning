<?php

$name = "DYENSTEIN\SQLEXPRESS02";

//DUPT
$connectionOptions = [
    "Database" => "EmpDeptDB",
    "Uid"=>"",
    "PWD"=>"",
    "TrustServerCertificate" => true

]

//sqlsrv_connect(1,2)/errors()

$connection = sqlsrv_connect($name,$connectionOptions);
//$connection se connection establish ho chuka now this is the main thing
//this will help us write queires...


//php me ye neeche FREAKING TEEN EQUALS HAIN...

if ($connection === false) {
    die(print_r(sqlsrv_errors(), true));

}



// ab sab se pehly what query ?
// secondly, query aur connection ka connecition
// just like we first did what server ?
// then what options
// then server aur options ka connection with sqlsrv_connect() se .......
// similarly we first answer what query ? and then connection between query and database ....
// so we establish connection b/w query (in a variable) with dedicated already defined server 
// via sqlsrv_query(connection string , query(it can be RAW here as well not neccesarily in a variable but in quotes))




//Now how to actually get a row from the query 
// we use variable = sqlsrv_fetch_array(connectionQueryandDBVariable, mode)
// there can be two modes 'SQLSRV_FETCH_ASSOC' and 'SQLSRV_FETCH_NUMERIC' ... 
// so based on the mode we can variable['column_name'] or variable[any number of the column] 


$sql  = "SELECT * FROM emp";
$stmt = sqlsrv_query($conn, $sql);
//okay so this stmt isnt a connection yet it bascially runs the query



if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

//fetching stuff row by row ..

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['EMPNO'];
    echo $row['ENAME'];
    echo $row['SAL'];
}


?>