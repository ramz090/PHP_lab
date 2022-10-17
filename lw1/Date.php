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
        if (!preg_match("/^[0-9,]+$/", $calculatingDate) or strlen($calculatingDate) < 5) {
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

        if ($arrDate[2] % 4 === 0 && $arrDate[1] == 2) {
            if ($arrDate[0] > 29 || $arrDate[0] < 1) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }

        if ($arrDate[2] % 4 !== 0 && $arrDate[1] == 2) {
            if ($arrDate[0] > 28 || $arrDate[0] < 1) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }
        if ($arrDate[1] == 1 or  $arrDate[1] == 3 or $arrDate[1] == 5 or $arrDate[1] == 7 or $arrDate[1] == 8 or $arrDate[1] == 10 or $arrDate[1] == 12) {
            if ($arrDate[0] < 1 or $arrDate[0] > 31) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }
        if ($arrDate[1] == 4 or  $arrDate[1] == 6 or $arrDate[1] == 9 or $arrDate[1] == 11) {
            if ($arrDate[0] < 1 or $arrDate[0] > 30) {
                echo ("Ошибка при вводе дня\n");
                $goodDay = false;
            }
        }
        if ($goodDay === true) {
            $this->day = $arrDate[0];
        }
    }


    public function diffDay(Date $firstDate, Date $secondDate): void
    {
        $tempNumberOfDay = 0;
        for ($I = 1; $I <= $firstDate->year; $I++) {
            if ($I == $firstDate->year) {
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


            if ($I % 4 == 0 && $I != $firstDate->year) {
                $tempNumberOfDay = $tempNumberOfDay + 366;
            }
            if ($I % 4 != 0 && $I != $firstDate->year) {
                $tempNumberOfDay = $tempNumberOfDay + 365;
            }
        }
        $firstDate->numberOfDay = $tempNumberOfDay;
        $secondNumberOfDay = 0;
        for ($I = 1; $I <= $secondDate->year; $I++) {
            if ($I == $secondDate->year) {
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


            if ($I % 4 == 0 && $I != $secondDate->year) {
                $secondNumberOfDay = $secondNumberOfDay + 366;
            }
            if ($I % 4 != 0 && $I != $secondDate->year) {
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
        echo ("$diffDay \n");
    }

    public function minusDay(int $day): void
    {
        $thisDay = $this->day;
        $thisMonth = $this->month;
        $thisYear = $this->year;
        if ($thisDay - $day > 0) {
            $thisDay = $thisDay - $day;
        } else {
            while ($thisDay - $day <= 0) {
                if ($thisMonth - 1 > 1) {
                    if ($thisMonth === 1 or  $thisMonth === 3 or $thisMonth === 5 or $thisMonth === 7 or $thisMonth === 8 or $thisMonth === 10 or $thisMonth === 12) {
                        $thisDay = $thisDay + 31;
                        $thisMonth = $thisMonth - 1;
                        continue;
                    }
                    if ($thisMonth === 4 or $thisMonth === 6 or $thisMonth === 9 or $thisMonth === 11) {
                        $thisDay = $thisDay + 30;
                        $thisMonth = $thisMonth - 1;
                        continue;
                    }
                    if ($thisMonth === 2 and $thisYear % 4 === 0) {
                        $thisDay = $thisDay + 29;
                        $thisMonth = $thisMonth - 1;
                        continue;
                    }
                    if ($thisMonth === 2 and $thisYear % 4 !== 0) {
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
                        echo ('Ошибка');
                    }
                }
            }
            $thisDay = $thisDay - $day;
        }
        echo ("$thisDay,$thisMonth,$thisYear\n");
    }

    public function format(string $choise): void
    {
        if ($choise === "ru") {
            echo ("$this->day.$this->month.$this->year\n");
        }
        if ($choise === "en") {
            echo ("$this->year-$this->month-$this->day\n");
        }
    }
    public function getDateOfWeek(): void
    {
        $dateTime = ("$this->year-$this->month-$this->day");
        $time = new DateTime($dateTime);
        $date = $time->format('w');
        if ($date == 1) {
            echo ("Пн\n");
        }
        if ($date == 2) {
            echo ("Вт\n");
        }
        if ($date == 3) {
            echo ("Ср\n");
        }
        if ($date == 4) {
            echo ("Чт\n");
        }
        if ($date == 5) {
            echo ("Пт\n");
        }
        if ($date == 6) {
            echo ("Сб\n");
        }
        if ($date == 7) {
            echo ("Вс\n");
        }
    }
}

$date = new Date('30,4,4');
$date2 = new Date('28,2,3');
$date->diffDay($date, $date2);
$date->minusDay(3);
$date->format("ru");
$date->format("en");
$date->getDateOfWeek();
