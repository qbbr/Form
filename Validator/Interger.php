<?php
/**
 * Interger
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_Interger extends Q_Form_Validator_Abstract
{
    public function isValid()
    {
        return is_numeric($this->_value);
    }
}