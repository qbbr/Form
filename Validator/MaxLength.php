<?php
/**
 * MaxLength
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_MaxLength extends Q_Form_Validator_Abstract
{
    protected $_maxLength;

    public function __construct($maxLength)
    {
        $this->_maxLength = $maxLength;
    }

    public function isValid()
    {
        return (strlen($this->_value) <= $this->_maxLength);
    }

    public function getError()
    {
        return 'Значение не должно быть больше ' . $this->_minLength;
    }
}