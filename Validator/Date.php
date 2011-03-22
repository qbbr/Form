<?php
/**
 * Date
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_Date extends Q_Form_Validator_Abstract
{
    protected $_format;

    public function __construct($format = 'd-m-Y')
    {
        $this->_format = $format;
    }

    public function isValid()
    {
        $format = $this->_format;
        $format = str_replace('d', '(0?[1-9]|[12][0-9]|3[01])', $format);
        $format = str_replace('m', '(0?[1-9]|1[012])', $format);
        $format = str_replace('y', '[0-9]{2}', $format);
        $format = str_replace('Y', '[0-9]{4}', $format);

        return preg_match('!^' . $format . '$!', $this->_value, $m);
    }

    public function getError()
    {
        return 'Дата должна быть в формате ' . $this->_format;
    }
}