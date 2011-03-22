<?php
/**
 * Regexp
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_Regexp extends Q_Form_Validator_Abstract
{
    protected $_regexp;

    public function __construct($regexp)
    {
        $this->_regexp = $regexp;
    }

    public function isValid()
    {
        return (bool) filter_var($this->_value, FILTER_VALIDATE_REGEXP);
    }
}