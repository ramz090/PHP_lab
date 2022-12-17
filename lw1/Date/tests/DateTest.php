<?php

require_once 'src/Date.php';
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    private $date;
    private $date2;
    
    protected function setUp(): void
    {
        $this->date = new Date('30,4,4');
        $this->date1 = new Date('23,2,3');
        $this->date2 = new Date('24,2,3');
        $this->date3 = new Date('25,2,3');
        $this->date4 = new Date('26,2,3');
        $this->date5 = new Date('27,2,3');
        $this->date6 = new Date('28,3,3');
        $this->date7 = new Date('1,3,3');
    }
    public function testDiffDay()
    {
        $this->assertEquals($this->date->diffDay($this->date,$this->date5),428); 
    }
    public function testMinusDay()
    {
        $this->assertEquals($this->date->minusDay(45),"15,3,4"); 
    }
    public function testformatRu()
    {
        $this->assertEquals($this->date->format("ru"),"30.4.4"); 
    }
    public function testformatEu()
    {
        $this->assertEquals($this->date->format("en"),"4-4-30"); 
    }
    public function testGetDateOfWeekMo()
    {
        $this->assertEquals($this->date1->getDateOfWeek(),"Пн"); 
    }
    public function testGetDateOfWeekTu()
    {
        $this->assertEquals($this->date2->getDateOfWeek(),"Вт"); 
    }
    public function testGetDateOfWeekWe()
    {
        $this->assertEquals($this->date3->getDateOfWeek(),"Ср"); 
    }
    public function testGetDateOfWeekTh()
    {
        $this->assertEquals($this->date4->getDateOfWeek(),"Чт"); 
    }
    public function testGetDateOfWeekFr()
    {
        $this->assertEquals($this->date5->getDateOfWeek(),"Пт"); 
    }
    public function testGetDateOfWeekSa()
    {
        $this->assertEquals($this->date6->getDateOfWeek(),"Сб"); 
    }
    public function testGetDateOfWeekSu()
    {
        $this->assertEquals($this->date7->getDateOfWeek(),"Вс"); 
    }

}