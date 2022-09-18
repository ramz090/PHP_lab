<<?php


function calculator(string $CountingString)
{
    if(strlen($CountingString) > 9 or strlen($CountingString)< 3) 
    {
        echo "Введены некоректные данные";
        return;

    }   
    $terms = str_split($CountingString);
    $summ=$terms[0];
    for ($i=0; $i< strlen($CountingString);$i++)
    {
        if (($i %2) != 0 and ($terms[$i] != '+' and $terms[$i] != '-'))
        {
            echo "Введены некоректные данные";
            return;
        }

            if($terms[$i] == '+')
            {
                $summ = $summ + $terms[$i+1];
            }
            if($terms[$i] == '-') // ищу символ '-'
            {
                $summ = $summ - $terms[$i+1]; //вычитаю из предыдущего элемента элемент через 1
            }
        
    }
    return $summ;
}
$EnteredString=readline("Введите строку: ");    


echo calculator($EnteredString);






