<!DOCTYPE html>
<html>
<head>
<title>Generate Table</title>
</head>



<?php
function Create_table($row, $columm)
{

echo("<table border=\"1\">\n");

for($r = 0; $r < $row; $r++) {
echo("<tr height=\"20px\">\n");

for($c = 0; $c < $columm; $c++) {
echo("<td width=\"80px\"></td>\n");
}

echo("</tr>\n");
}
echo("</table>\n");

}
Create_table(10,3);
?>


</body>
</html>