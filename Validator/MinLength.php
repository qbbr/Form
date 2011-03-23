<?php
/**
 * MinLength
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_MinLength extends Q_Form_Validator_Abstract
{
    protected $_minLength;

    public function __construct($minLength)
    {
        $this->_minLength = $minLength;
    }

    public function isValid()
    {
        return (strlen($this->_value) >= $this->_minLength);
    }

    public function getError()
    {
        return 'Кол-во символов не должно быть меньше ' . $this->_minLength;
    }
}