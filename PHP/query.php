<?php
$serverName = "DYENSTEIN\\SQLEXPRESS02";

$connectionOptions = array(
    "Database" => "EmpDeptDB",
    "Uid" => "",
    "PWD" => "",
    "TrustServerCertificate" => true
);




function pattern($i = 0)
{
	
	if ($i==5)
	{
	return 0;
	}
	
	printer($i+1);
	echo "</br>";
	pattern($i+1);	
}


function printer($amount)
{
	for($j = 0; $j < $amount ; $j++)
	{
		echo "*";
	}

}


pattern();


$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Connected successfully! <br><br>";

$sql = "SELECT * FROM emp";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "Employee ID: " . $row['EMPNO'] . "<br>";
    echo "Employee Name: " . $row['ENAME'] . "<br>";
    echo "Salary: " . $row['SAL'] . "<br>";
    echo "<hr>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h2 {
            font-weight: bold;
        }
        table {
            width: 90%;
        }
        th {
            background-color: #ff00b7;
            color: white;
            text-align: left;
            padding: 8px 12px;
        }
        td {
            border: 1px solid #ff0404;
            padding: 6px 12px;
        }
    </style>
</head>

<body>
<h2>List of Employee</h2>

<table>
    <tr>
        <th>Employee No.</th>
        <th>Name</th>
        <th>Designation</th>
    </tr>

    <?php
    $sql = "SELECT EMPNO, ENAME, JOB FROM emp";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['EMPNO'] . "</td>";
        echo "<td>" . $row['ENAME'] . "</td>";
        echo "<td>" . $row['JOB']   . "</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>

<?php
sqlsrv_close($conn);
?>
