<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class PowerCommand extends Operation
{
    protected $command = 'power';

    protected $commandPassive = 'exponent';

    protected $operator = '^';

    protected $argument = 2;
    
    protected function calculate($number1, $number2)
    {
        return pow($number1, $number2);
    }

    protected function getDescriptions() : void
    {
        parent::getDescriptions();
        $this->description = sprintf('%s calculate the exponent of the given numbers', ucfirst($this->command));
    }
}
