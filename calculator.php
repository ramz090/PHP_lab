<<?php

    function calculator(string $countingString): ?string
    {
        if (!preg_match("/[0-9, \- + ]+$/", $countingString)) {
            return "Вводите только разрешенные символы";
        }
        $terms = explode("+", $countingString);
        $summ = 0;
        $temp = "";
        $numberOfOperations = 0;

        foreach ($terms as $key => &$value) {
            $minusPos = strpos($value, "-");
            if ($minusPos != false) {
                $termsMinus = explode("-", $value);
                foreach ($termsMinus as $keyMinus => &$valueMinus) {
                    if ($keyMinus === 0) {
                        $temp = $valueMinus;
                        $numberOfOperations++;
                    } else {
                        $temp = $temp - $valueMinus;
                        $numberOfOperations++;
                    }
                }
                $summ = $summ + $temp;
            } else {
                $summ = $summ + $value;
                $numberOfOperations++;
            }
        }
        if ($numberOfOperations > 5) {
            return "Введено больше 5 слогаемых";
        }
        return $summ;
    }
    $enteredString = readline("Введите строку: ");
    echo calculator($enteredString);
