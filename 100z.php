
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
        class Cell 
        {
            public $number;

            function setNumber($number)
            {
                $this->number = $number;
            }

            function getNumber()
            {
                return $this->number;
            }

            function isPrime()
            {
                $isPrime = true;
                if($this->number == 1){
                    $isPrime = false;
                }
                for($i = 2; $i <= $this->number; $i++)
                {
                    if(($this->number % $i == 0 && $i != $this->number))
                    {
                        //echo '<p>number:' .$number.', i:' .$i. '</p>';
                        $isPrime = false;
                        break;
                    }
                    // printf("<script>console.log('test')</script>");
                }
                return $isPrime;
            }
        }


        $matrix = [];
        
        for($i = 0; $i < 10; $i++)
        {
            $matrix[i] = [];
            echo "<tr>";
            for($j = 0; $j < 10; $j ++)
            {
                $matrix[$i][$j] = new Cell();
                $matrix[$i][$j]->setNumber(($i * 10) + $j + 1);
                if($matrix[$i][$j]->isPrime())
                {
                    $class = "primeClass";
                }
                else 
                {
                    $class = "cell";
                }
                echo '<td class="'.$class.'">'
                .$matrix[$i][$j]->getNumber().
                '</td>';
            }
            echo "</tr>";
            

        }

        ?>
    </table>
  </body>
</html>