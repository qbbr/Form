<?php
/**
 * NotBlank
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_NotBlank extends Q_Form_Validator_Abstract
{
    public function isValid()
    {
        return (trim($this->_value) !== '');
    }

    public function getError()
    {
        return 'Поле обязательно к заполнению';
    }
}