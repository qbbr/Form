<?php
/**
 * List
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_List extends Q_Form_Validator_Abstract
{
    protected $_list;

    public function __construct(array $list)
    {
        $this->_list = $list;
    }

    public function isValid()
    {
        return in_array($this->_value, $this->_list);
    }

    public function getError()
    {
        return 'Значение должно быть одно из списка ' . implode(', ', $this->_list);
    }
}