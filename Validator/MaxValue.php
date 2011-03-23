<?php
/**
 * MaxValue
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_MaxValue extends Q_Form_Validator_Abstract
{
    protected $_maxValue;

    public function __construct($maxValue)
    {
        $this->_maxValue = $maxValue;
    }

    public function isValid()
    {
        return ($this->_value <= $this->_maxValue);
    }

    public function getError()
    {
        return 'Число не должно быть больше ' . $this->_minLength;
    }
}