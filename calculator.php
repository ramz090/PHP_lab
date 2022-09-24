<<?php

    function calculator(string $countingString): ?string
    {
        if (!preg_match("/[0-9, \- + ]+$/", $countingString)) {
            echo "Вводите только разрешенные символы";
            return null;
        }
        $terms = explode("+", $countingString);
        $summ = 0;
        $temp = "";


        foreach ($terms as $key => &$value) {
            $minusPos = strpos($value, "-");
            if ($minusPos != false) {
                $termsMinus = explode("-", $value);
                foreach ($termsMinus as $keyMinus => &$valueMinus) {
                    if ($keyMinus === 0) {
                        $temp = $valueMinus;
                    } else {
                        $temp = $temp - $valueMinus;
                    }
                }
                $summ = $summ + $temp;
            } else {
                $summ = $summ + $value;
            }
        }

        return $summ;
    }
    $enteredString = readline("Введите строку: ");
    echo calculator($enteredString);
