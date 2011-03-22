<?php
/**
 * File
 *
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Form_Element_File extends Q_Form_Element_Textfield
{
    protected $_type = 'file';
    protected $_uploadDir;
    protected $_sizeLimit = 10485760; // 10485760 byte = 10Mb
    protected $_allowedExtensions = array(); // empty = all

    public function setUploadDir($dir)
    {
        if (!is_dir($dir)) {
            throw new Q_Form_Element_Exception("Dir ({$dir}) not found");
        }

        if (!is_writable($dir)) {
            throw new Q_Form_Element_Exception("Dir ({$dir}) is not writable");
        }

        $this->_uploadDir = $dir;
    }
}