<?php
/**
 * Abstract
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
abstract class Q_Form_Validator_Abstract
{
    protected $_value;
    protected $_name = '';

    public function setValue($value)
    {
        $this->_value = $value;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getError()
    {
        return '';
    }

    /**
     * @return boolean
     */
    abstract public function isValid();
}