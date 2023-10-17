
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
            public $isPrime;
            public $isPartOfColumn = false;
            public $class;

            function setNumber($number)
            {
                $this->number = $number;
            }
            function setIsPrime($isPrime)
            {
                $this->isPrime = $isPrime;
            }

            function setIsPartOfColumn($isPartOfColumn)
            {
                $this->isPartOfColumn = $isPartOfColumn;
            }

            function getNumber()
            {
                return $this->number;
            }

        }


        $matrix = initializeMatrix();

        for($i = 0; $i < 10; $i++)
        {
            echo "<tr>";
            for($j = 0; $j < 10; $j++)
            {

                if($matrix[$i][$j]->isPrime && !$matrix[$i][$j]->isPartOfColumn)
                    {
                        if($matrix[$i + 1][$j]->isPrime)
                        {
                            $matrix[$i][$j]->setIsPartOfColumn(true);
                            $matrix[$i + 1][$j]->setIsPartOfColumn(true);
                            if($matrix[$i + 2][$j]->isPrime)
                            {
                                $matrix[$i + 2][$j]->setIsPartOfColumn(true);
                            }
                        }
                    }


                if($matrix[$i][$j]->isPartOfColumn)
                {
                    $matrix[$i][$j]->class = "columnClass";
                }
                else if($matrix[$i][$j]->isPrime && !$matrix[$i][$j]->isPartOfColumn)
                {
                    $matrix[$i][$j]->class = "primeClass";
                }
                else
                {
                    $matrix[$i][$j]->class = "cell";
                }
                // echo '<p>number: ' .$matrix[$i][$j]->getNumber(). '</p>';
                // echo '<p>part of column: ' .$matrix[$i][$j]->isPartOfColumn. '</p>';
                // echo '<p>prime: ' .$matrix[$i][$j]->isPrime. '</p>';
                // echo '<p>class: ' .$matrix[$i][$j]->class. '</p>';
                // echo '<p>i: ' .$i. '</p>';
                // echo '<p>j: ' .$j. '</p>';


                echo '<td class="'.$matrix[$i][$j]->class.'">'
                .$matrix[$i][$j]->getNumber().
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
                    if(($number % $i == 0 && $i != $number))
                    {
                        //echo '<p>number:' .$number.', i:' .$i. '</p>';
                        $isPrime = false;
                        break;
                    }
                    // printf("<script>console.log('test')</script>");
                }
                return $isPrime;
            }

        function initializeMatrix()
        {
            $matrix = [];
            for ($i = 0; $i < 10; $i++)
            {
                $matrix[$i] = [];
                for ($j = 0; $j < 10; $j++)
                {
                    $matrix[$i][$j] = new Cell();
                    $matrix[$i][$j]->setNumber(($i * 10) + $j + 1);
                    $matrix[$i][$j]->setIsPrime(isPrime($matrix[$i][$j]->getNumber()));

                }
            }
            return $matrix;
        }

        ?>
    </table>
  </body>
</html>