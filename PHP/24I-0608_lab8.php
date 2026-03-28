<!-- Muhammad Dyen Asif 24I-0608 -->
<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
</head>
<body>

<form method="post">
    <table border="1">
        <tr>
            <td colspan="2">Hello visitor!!</td>
        </tr>
        <tr>
            <td colspan="2" align="center"><b>Please provide us the requested information</b></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="Male" checked> Male
                <input type="radio" name="gender" value="Female"> Female
            </td>
        </tr>
        <tr>
            <td>Education</td>
            <td>
                <select name="education">
                    <option value="Masters" selected>Masters</option>
                    <option value="Bachlors">Bachlors</option>
                    <option value="Intermediate">Intermediate</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $education = $_POST["education"];

    echo "<br><h3>You provided these details:</h3>";
    echo "Name: " . $name . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Education: " . $education . "<br>";

}
?>

</body>
</html>