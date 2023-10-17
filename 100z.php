
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>100 Zahlen</title>
    <link rel="stylesheet" href="./css/100z.css">
  </head>
  <body>
    <table>
        <?php
        $matrix = [];
        $zahl = 1;
        
        for($i = 0; $i < 10; $i++)
        {
            $matrix[i] = [];
            echo "<tr>";
            for($j = 0; $j < 10; $j ++)
            {
                $matrix[i][j] = ($i * 10) + $j + 1;
                if(isPrime($matrix[i][j]))
                {
                    $class = "primeClass";
                }
                else 
                {
                    $class = "cell";
                }
                echo '<td class="'.$class.'">'
                .$matrix[i][j].
                '</td>';
            }
            echo "</tr>";
            

        }

        function isPrime($number)
        {
            $isPrime = true;
            if($number == 1){
                $isPrime = false;
            }
            for($i = 2; $i <= $number; $i++)
            {
                if(($number % $i == 0 && $i != $number) || $number == 1)
                {
                    //echo '<p>number:' .$number.', i:' .$i. '</p>';
                    $isPrime = false;
                    break;
                }
                // printf("<script>console.log('test')</script>");
            }
            return $isPrime;
        }
        ?>
    </table>
  </body>
</html>