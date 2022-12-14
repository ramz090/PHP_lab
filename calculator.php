<?php
$enteredSting = $argv[1];
function calculator(string $countingString): string
{
    if (!preg_match("/^[0-9a-z_]+$/i", $countingString) || strlen($countingString) > 19) {
        return "Вводите только разрешенные символы";
    }
    $terms = explode("+", $countingString);
    $summ = 0;
    $temp = "";
    $numberOfOperations = 0;

    foreach ($terms as $term) {
        $minusPos = strpos($term, "-");
        if ($minusPos) {
            $termsMinus = explode("-", $term);
            foreach ($termsMinus as $keyMinus => $termMinus) {
                if ($keyMinus === 0) {
                    $temp = $termMinus;
                    $numberOfOperations++;
                } else {
                    $temp = $temp - (int)$termMinus;
                    $numberOfOperations++;
                }
            }
            $summ = $summ + $temp;
        } else {
            $summ = $summ + $term;
            $numberOfOperations++;
        }
    }
    if ($numberOfOperations > 5) {
        return "Введено больше 5 слогаемых";
    }
    return $summ;
}
echo calculator($enteredSting);
