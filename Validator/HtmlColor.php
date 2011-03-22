<?php
/**
 * HtmlColor
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Validator_HtmlColor extends Q_Form_Validator_Abstract
{
    public function isValid()
    {
        if (preg_match('!^#[0-9a-fA-F]{6}$!', $this->_value)) {
            return true;
        }
        
        return false;
    }
}