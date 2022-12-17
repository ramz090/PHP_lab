<?php

class Date
{
    protected int $day;
    protected int $month;
    protected int $year;
    protected int $numberOfDay;
    public function __construct(string $calculatingDate)
    {
        $goodDay = true;
        if (!preg_match("/^[0-9,]+$/", $calculatingDate) || strlen($calculatingDate) < 5) {
            echo ("Вводите только разрешенные символы\n");
        }
        $arrDate = explode(",", $calculatingDate);
        if ($arrDate[2] < 1) {
            echo ("Ошибка при вводе года\n");
        } else {
            $this->year = $arrDate[2];
        }
        if ($arrDate[1] < 1 || $arrDate[1] > 12) {
            echo ("Ошибка при вводе месяца\n");
        } else {
            $this->month = $arrDate[1];
        }

        if ($arrDate[2] % 4 === 0 && (int)$arrDate[1] === 2) {
            if ($arrDate[0] > 29 || $arrDate[0] < 1) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }

        if ($arrDate[2] % 4 !== 0 && (int)$arrDate[1] === 2) {
            if ($arrDate[0] > 28 || $arrDate[0] < 1) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }
        if ((int)$arrDate[1] === 1 ||  (int)$arrDate[1] === 3 || (int)$arrDate[1] === 5 || (int)$arrDate[1] === 7 || (int)$arrDate[1] === 8 || (int)$arrDate[1] === 10 || (int)$arrDate[1] === 12) {
            if ($arrDate[0] < 1 || $arrDate[0] > 31) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }
        if ((int)$arrDate[1] === 4 ||  (int)$arrDate[1] === 6 || (int)$arrDate[1] === 9 || (int)$arrDate[1] === 11) {
            if ($arrDate[0] < 1 || $arrDate[0] > 30) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }
        if ($goodDay) {
            $this->day = $arrDate[0];
        }
    }


    public function diffDay(Date $firstDate, Date $secondDate): int
    {
        $tempNumberOfDay = 0;
        for ($i = 1; $i <= $firstDate->year; $i++) {
            if ($i == $firstDate->year) {
                for ($j = 1; $j < $firstDate->month; $j++) {
                    if ($j === 1 || $j === 3 || $j === 5 || $j === 7 || $j === 8 || $j === 10 || $j === 12) {
                        $tempNumberOfDay = $tempNumberOfDay + 31;
                    }
                    if ($j === 4 || $j === 6 || $j === 9 || $j === 11) {
                        $tempNumberOfDay = $tempNumberOfDay + 30;
                    }
                    if ($j === 2 && $firstDate->year % 4 === 0) {
                        $tempNumberOfDay = $tempNumberOfDay + 29;
                    }
                    if ($j === 2 && $firstDate->year % 4 !== 0) {
                        $tempNumberOfDay = $tempNumberOfDay + 28;
                    }
                }
                $tempNumberOfDay = $tempNumberOfDay + $firstDate->day;
            }


            if ($i % 4 === 0 && $i !== $firstDate->year) {
                $tempNumberOfDay = $tempNumberOfDay + 366;
            }
            if ($i % 4 !== 0 && $i !== $firstDate->year) {
                $tempNumberOfDay = $tempNumberOfDay + 365;
            }
        }
        $firstDate->numberOfDay = $tempNumberOfDay;
        $secondNumberOfDay = 0;
        for ($i = 1; $i <= $secondDate->year; $i++) {
            if ($i === $secondDate->year) {
                for ($j = 1; $j < $secondDate->month; $j++) {
                    if ($j === 1 || $j === 3 || $j === 5 || $j === 7 || $j === 8 || $j === 10 || $j === 12) {
                        $secondNumberOfDay = $secondNumberOfDay + 31;
                    }
                    if ($j === 4 || $j === 6 || $j === 9 || $j === 11) {
                        $secondNumberOfDay = $secondNumberOfDay + 30;
                    }
                    if ($j === 2 && $secondDate->year % 4 === 0) {
                        $secondNumberOfDay = $secondNumberOfDay + 29;
                    }
                    if ($j === 2 && $secondDate->year % 4 !== 0) {
                        $secondNumberOfDay = $secondNumberOfDay + 28;
                    }
                }
                $secondNumberOfDay = $secondNumberOfDay + $secondDate->day;
            }


            if ($i % 4 === 0 && $i !== $secondDate->year) {
                $secondNumberOfDay = $secondNumberOfDay + 366;
            }
            if ($i % 4 !== 0 && $i !== $secondDate->year) {
                $secondNumberOfDay = $secondNumberOfDay + 365;
            }
        }
        $secondDate->numberOfDay = $secondNumberOfDay;
        if ($tempNumberOfDay < $secondNumberOfDay) {
            $temp = $secondNumberOfDay;
            $secondNumberOfDay = $tempNumberOfDay;
            $tempNumberOfDay = $temp;
        }
        $diffDay = $tempNumberOfDay - $secondNumberOfDay;
        return $diffDay;
    }

    public function minusDay(int $day): string
    {
        $thisDay = $this->day;
        $thisMonth = $this->month;
        $thisYear = $this->year;
        if ($thisDay - $day > 0) {
            $thisDay = $thisDay - $day;
        } else {
            while ($thisDay - $day <= 0) {
                if ($thisMonth - 1 > 1) {
                    if ($thisMonth === 1 ||  $thisMonth === 3 || $thisMonth === 5 || $thisMonth === 7 || $thisMonth === 8 || $thisMonth === 10 || $thisMonth === 12) {
                        $thisDay = $thisDay + 31;
                        $thisMonth = $thisMonth - 1;
                        continue;
                    }
                    if ($thisMonth === 4 || $thisMonth === 6 || $thisMonth === 9 || $thisMonth === 11) {
                        $thisDay = $thisDay + 30;
                        $thisMonth = $thisMonth - 1;
                        continue;
                    }
                    if ($thisMonth === 2 && $thisYear % 4 === 0) {
                        $thisDay = $thisDay + 29;
                        $thisMonth = $thisMonth - 1;
                        continue;
                    }
                    if ($thisMonth === 2 && $thisYear % 4 !== 0) {
                        $thisDay = $thisDay + 28;
                        $thisMonth = $thisMonth - 1;
                        continue;
                    }
                } else {
                    if ($thisYear - 1 > 1) {
                        $thisMonth = $thisMonth  + 12;
                        $thisDay = $thisDay + 31;
                        $thisYear = $thisYear - 1;
                        continue;
                    } else {
                        return ('Ошибка');
                    }
                }
            }
            $thisDay = $thisDay - $day;
        }
        return $thisDay . "," . $thisMonth . "," . $thisYear;
    }

    public function format(string $choise): string
    {
        if ($choise === "ru") {
            return "$this->day.$this->month.$this->year";
        }
        if ($choise === "en") {
            return "$this->year-$this->month-$this->day";
        }
    }
    public function getDateOfWeek(): string
    {
        $dateTime = ("$this->year-$this->month-$this->day");
        $time = new DateTime($dateTime);
        $date = (int)$time->format('w');
        if ($date === 0) {
            return "Пн";
        }
        if ($date === 1) {
            return "Вт";
        }
        if ($date === 2) {
            return "Ср";
        }
        if ($date === 3) {
            return "Чт";
        }
        if ($date === 4) {
            return "Пт";
        }
        if ($date === 5) {
            return "Сб";
        }
        if ($date === 6) {
            return "Вс";
        }
        return "";
    }
}

$date = new Date('30,4,4');
$date2 = new Date('2,3,3');
echo ("{$date->diffDay($date,$date2)}\n");
echo ("{$date->minusDay(45)}") . PHP_EOL;
echo ("{$date->format("ru")}") . PHP_EOL;
echo ("{$date->format("en")}") . PHP_EOL;
echo ("{$date2->getDateOfWeek()}").PHP_EOL;
