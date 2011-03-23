<?php
/**
 * MinValue
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_MinValue extends Q_Form_Validator_Abstract
{
    protected $_minValue;

    public function __construct($minValue)
    {
        $this->_minValue = $minValue;
    }

    public function isValid()
    {
        return ($this->_value >= $this->_minValue);
    }

    public function getError()
    {
        return 'Число не должно быть меньше ' . $this->_minValue;
    }
}