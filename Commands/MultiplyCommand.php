<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class MultiplyCommand extends Operation
{
    protected $command = 'multiply';

    protected $commandPassive = 'multiplied';

    protected $operator = '*';

    protected $argument = null;
    
    protected function calculate($number1, $number2)
    {
        return $number1 * $number2;
    }
}
