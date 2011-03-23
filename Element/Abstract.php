<?php
/**
 * Abstract
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
abstract class Q_Form_Element_Abstract
{
    protected $_name;
    protected $_value;
    protected $_label;
    protected $_attributes = array();
    protected $_errors = array();
    
    /**
     * @var Q_Form_Validator_Abstract
     */
    protected $_validators = array();

    /**
     * @param string $name
     * @param string $label
     * @param mixed $value
     */
    public function __construct($name, $label = null, $value = null)
    {
        $this->_name = $name;
        if (null !== $label) $this->_label = $label;
        if (null !== $value) $this->_value = $value;
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

    /**
     * @param array $validators
     */
    public function setValidators(array $validators)
    {
        foreach ($validators as $validator) {
            $this->setValidator($validator);
        }
    }

    /**
     * @param Q_Form_Validator_Abstract $validator
     */
    public function setValidator(Q_Form_Validator_Abstract $validator)
    {
        $validator->setValue($this->_value);
        $validator->setName($this->_label);
        $this->_validators[] = $validator;
    }

    public function isValid()
    {
        $return = true;

        foreach ($this->_validators as $validator) {
            if (!$validator->isValid()) {
                $error = $validator->getError();
                if (!empty($error)) $this->_errors[] = $error;
                $return = false;
            }
        }

        return $return;
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    public function getLabel()
    {
        return $this->_label;
    }

    protected function getHtmlLabel()
    {
        return (null !== $this->_label) ? "<label>{$this->_label}</label>\n" : '';
    }

    /**
     * @return string
     */
    abstract public function toHtml();

    /**
     * @see toHtml()
     */
    public function __toString()
    {
        return "<div>\n" . $this->getHtmlLabel() . $this->toHtml() . "\n</div>";
    }
}