<?php

/**
 * Easynfe - NF-e. 
 *
 * @title      Magento Easynfe NF-e
 * @category   General
 * @package    Doit_Easynfe
 * @author     Indexa Development Team <desenvolvimento@indexainternet.com.br>
 * @copyright  Copyright (c) 2011 Indexa - http://www.indexainternet.com.br
 */


class Doit_Easynfe_Model_System_Config_Certificado extends Mage_Core_Model_Config_Data
{
    public function _afterSave(){
        Mage::getResourceModel('doit_easynfe/certificado')->uploadAndImport($this);
    }
 
}