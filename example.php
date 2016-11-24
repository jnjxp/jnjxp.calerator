<?php
// @codingStandardsIgnoreFile

require './vendor/autoload.php';

use Jnjxp\Calerator\Year;
use Jnjxp\Calerator\Month;
use Jnjxp\Calerator\Week;
use Jnjxp\Calerator\Day;


class Format
{
    protected $width = 27;

    public function days()
    {
        return ' Su  Mo  Tu  We  Th  Fr  Sa';
    }

    public function line()
    {
        return "\n" . str_repeat('-', $this->width)."\n";
    }

    public function year(Year $year) {
        foreach ($year as $month) {
            $this->month($month);
        }
    }

    public function month(Month $month) {
        echo str_pad($month->getName(), $this->width, ' ', STR_PAD_BOTH);
        echo $this->line();
        echo $this->days();
        echo $this->line();
        foreach ($month as $week) {
            $this->week($week);
        }
        echo "\n\n";
    }

    public function week(Week $week) {
        foreach ($week as $day) {
            $this->day($day);
        }
        echo "\n";
    }

    public function day(Day $day) {
        echo str_pad($day, 3, ' ', STR_PAD_LEFT) . ' ';
    }

    public function singleWeek(Week $week)
    {
        $month = $week->getParent();
        $year  = $month->getParent();
        echo sprintf(
            'Week %s of %s, %s',
            $month->key(),
            $month->getName(),
            $year
        );
        echo $this->line();
        echo $this->days();
        echo $this->line();
        $this->week($week);
    }
}

$format = new Format;

$format->year(new Year(2016));

$format->month(Month::create(2016, 5));

$format->singleWeek(Week::create(2016, 6, 2));

foreach(Week::create(2016, 6, 5) as $day) {
    foreach ($day as $hour) {
        echo $hour->format('gA');
        echo "\n";
    }
    exit();
}

