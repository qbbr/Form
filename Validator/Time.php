<?php
/**
 * Time
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_Time extends Q_Form_Validator_Abstract
{
    protected $_format;

    public function __construct($format = 'H:i:s')
    {
        $this->_format = $format;
    }

    public function isValid()
    {
        $format = $this->_format;
        $format = str_replace('H', '(0?[1-9]|1[0-9]|2[0-4])', $format);
        $format = str_replace('h', '(0?[1-9]|1[012])', $format);
        $format = str_replace(array('i', 's'), '(0?[1-9]|[1-5][0-9]|60)', $format);
        
        return preg_match('!^' . $format . '$!', $this->_value, $m);
    }

    public function getError()
    {
        return 'Время должна быть в формате ' . $this->_format;
    }
}