<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tugas Praktikum 2</title>
    </head>
      
    <h2>GENERATE SEL TABEL</h2>
    <table>
        <form method="get">
        <tr>        
        <td> Masukkan baris  <br><br></td>
        <td>: <input type="text" size="12" name="baris"><br><br></td>
        </tr>
        <tr>
        <td> Masukkan cell<br><br> </td>
        <td>: <input type="text" size="12" name="kolom"><br><br></td>
        </tr>
	
        <tr>
        <td></td>
        <td align="right"> <input type="submit" value="Generate"></td>
        </tr>
        </form>
        </table>
        <br>
        <?php
            $baris = $_GET["baris"];
            $kolom = $_GET["kolom"];
           
            function generate($baris, $kolom){
                $cell = 0;
               
                echo "<table border='2' cellpadding='10'>";
               
                for($i = 0; $i < $baris; $i++){
                    echo "<tr>";
                        for($j = 0; $j < $kolom; $j++){
                            ++$cell;
                            echo "<td>$cell</td>";
                        }
                    echo "</tr>";
                }
               
                echo "</table>";
            }
           
            if(isset($baris) AND isset($kolom)){
                generate($baris, $kolom);
            }
        ?>
       
    </body>
</html>