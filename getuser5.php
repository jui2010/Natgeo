<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding-top: 10px;padding-bottom: 10px;
    padding-left: 35px;padding-right: 35px;
    font-size: 15px;
    font-family: Monospace;
    letter-spacing: 1px;
 white-space: nowrap;
}

th {text-align: left;
font-size: 15px;
font-family: Monospace;
letter-spacing: 1px;
text-transform: uppercase;
width: 50%;}
</style>
</head>
<body>

<?php
global $q1;
$q = strval($_GET['q']);
$q1 = strval($_GET['q1']);
$con = mysqli_connect('localhost','root','','agriculture');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

$sql="SELECT * FROM farmer WHERE id = (SELECT MAX(id) FROM farmer);";
$result = mysqli_query($con,$sql);

echo "<table>";

while($row = mysqli_fetch_array($result)) {

    echo "<tr>";echo "<th>NAME</th><td>" . $row['name'] . "</td>";echo "<th>income</th><td>" . $row['income'] . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>DISTRICT</th><td>" . $row['district'] . "</td>";echo "<th>seed cost</th><td>" . $row['seed'] . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>TALUKA</th><td>" . $row['taluka'] . "</td>";echo "<th nowrap>Organic Fertiliser Cost</th><td>" . $row['ofert'] . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>VILLAGE</th><td>" . $row['village'] . "</td>";echo "<th>Chemical Fertiliser Cost</th><td>" . $row['cfert'] . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>CROP</th><td>" . $row['crop'] . "</td>";echo "<th>Pesticide cost</th><td>" . $row['pesticide'] . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>SEASON</th><td>" . $row['season'] . "</td>";echo "<th>Labour Cost</th><td>" . $row['labour'] . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>ACREAGE ( HECTARES )</th><td>" . $row['acre'] . "</td>";echo "<th>Water Cost</th><td>" . $row['water'] . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>TEMPERATURE</th><td>" . $row['temp'] . "</td>";echo "<th>Other Cost</th><td>" . $row['other'] . "</td>";echo "</tr>";

    $t=$row['seed']+ $row['ofert']+ $row['cfert']+ $row['pesticide'] +$row['labour'] +$row['water']+ $row['other'] ;

    echo "<tr>";echo "<th>RAINFALL</th><td>" . $row['rain'] . "</td>";echo "<th>Total cost</th><td>" . $t . "</td>";echo "</tr>";

    echo "<tr>";echo "<th>YIELD</th><td>" . $row['yield'] . "</td>";echo "<th>profit</th><td>" . $row['profit'] . "</td>";echo "</tr>"; 
}

echo "</table>";
mysqli_close($con);
?>
</body>
</html>