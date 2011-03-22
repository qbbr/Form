<?php
/**
 * Mail
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_Mail extends Q_Form_Validator_Abstract
{
    public function isValid()
    {
        return (bool) filter_var($this->_value, FILTER_VALIDATE_EMAIL);
    }

    public function getError()
    {
        return 'Mail введён не верно';
    }
}