<?php

namespace Jakmall\Recruitment\Calculator\Commands;

//use Jakmall\Recruitment\Calculator\Commands\HasCommand;

class AddCommand extends Operation
{
    protected $command = 'add';

    protected $commandPassive = 'added';

    protected $operator = '+';

    protected $argument = null;

    protected function calculate($number1, $number2)
    {
        return $number1 + $number2;
    }
}
