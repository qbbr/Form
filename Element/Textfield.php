<?php
/**
 * Textfield
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Element_Textfield extends Q_Form_Element_Abstract
{
    protected $_type = 'text';

    public function toHtml()
    {
        $html = '<input type="' . $this->_type . '" name="' . $this->_name . '"';
        if (null !== $this->_value) $html .= ' value="' . $this->_value . '"';
        $html .= $this->getAttributes();
        $html .= '/>';

        return $html;
    }
}