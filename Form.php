<?php
/**
 * Form
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form
{
    protected $_formName = '';

    /**
     * @var array Атрибуты формы
     */
    protected $_attributes = array(
        'method' => 'post'
    );
    
    /**
     * @var Q_Form_Element_Abstract
     */
    protected $_elements = array();

    protected $_errors = array();

    /**
     * @param string $action Url
     * @param array $attributes
     */
    public function __construct($name, $action = '', array $attributes = null)
    {
        $this->_formName = $name;
        $this->addElement(new Q_Form_Element_Hidden('__formName__', $name));
        $this->setAttribute('action', $action);
        if (null !== $attributes) $this->setAttributes($attributes);
    }

    /**
     * @param Q_Form_Element_Abstract $element
     */
    public function addElement(Q_Form_Element_Abstract $element)
    {
        $this->_elements[] = $element;
    }

    /**
     * @param array $elements
     */
    public function addElements(array $elements = array())
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }
    }

    /**
     * @return string
     */
    protected function getElements()
    {
        $elements = array();

        foreach ($this->_elements as $element) {
            $elements[] = (string) $element;
        }

        return implode("\n", $elements);
    }

    /**
     * @param string $name
     * @param string $param
     */
    public function setAttribute($name, $param)
    {
        $this->_attributes[$name] = $param;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $name => $param) {
            $this->setAttribute($name, $param);
        }
    }

    /**
     * @return string
     */
    protected function getAttributes()
    {
        $attributes = array();

        foreach ($this->_attributes as $name => $param) {
            $attributes[] = $name . '="' . $param . '"';
        }

        $attributes = implode(' ', $attributes);
        if (!empty($attributes)) $attributes = ' ' . $attributes;

        return $attributes;
    }

    public function setRedirectUrl($url)
    {
        $this->addElement(new Q_Form_Element_Hidden('redirect_url', $url));
    }

    /**
     * @param boolean $value true/false
     */
    public function isMultipart($value = false)
    {
        $this->setAttribute('enctype', $method);
    }

    /**
     * @return boolean
     */
    public function isSubmit()
    {
        if ($this->_attributes['method'] == 'post') {
            return (isset($_POST['__formName__']) && $_POST['__formName__'] == $this->_formName);
        } else {
            return (isset($_GET['__formName__']) && $_GET['__formName__'] == $this->_formName);
        }
    }

    public function isValid()
    {
        $return = true;

        foreach ($this->_elements as $element) {
            if (!$element->isValid()) {
                $error = $element->getErrors();
                $label = $element->getLabel();
                if (!empty($error)) $this->_errors[$label] = $error;
                $return = false;
            }
        }

        return $return;
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    public function __toString()
    {
        $html = "<form{$this->getAttributes()}>\n{$this->getElements()}\n</form>";

        return $html;
    }
}