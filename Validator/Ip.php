<?php
/**
 * Ip
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_Ip extends Q_Form_Validator_Abstract
{
    public function isValid()
    {
        return (bool) filter_var($this->_value, FILTER_VALIDATE_IP);
    }

    public function getError()
    {
        return 'IP введён не верно';
    }
}