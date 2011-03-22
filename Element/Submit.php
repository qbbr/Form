<?php
/**
 * Submit
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Element_Submit extends Q_Form_Element_Textfield
{
    public function __construct($name, $value = null)
    {
        parent::__construct($name, null, $value);
    }

    protected $_type = 'submit';
}