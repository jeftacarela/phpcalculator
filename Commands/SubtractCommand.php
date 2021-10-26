<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class SubtractCommand extends Operation
{
    protected $command = 'subtract';

    protected $commandPassive = 'subtracted';

    protected $operator = '-';

    protected $argument = null;
    
    protected function calculate($number1, $number2)
    {
        return $number1 - $number2;
    }
}
