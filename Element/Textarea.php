<?php
/**
 * Textarea
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Element_Textarea extends Q_Form_Element_Abstract
{
    public function toHtml()
    {
        $html = '<textarea name="' . $this->_name . '"';
        $html .= $this->getAttributes() . '>';
        if (null !== $this->_value) $html .= $this->_value;
        $html .= '</textarea>';

        return $html;
    }
}