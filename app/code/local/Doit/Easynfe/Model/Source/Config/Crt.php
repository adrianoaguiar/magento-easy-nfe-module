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

class Doit_Easynfe_Model_Source_Config_Crt
{
    /**
     * Retrieve CRT information
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_CRT_SIMPLES,
                'label' => Mage::helper('adminhtml')->__('Simples Nacional')
            ),
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_CRT_SIMPLES_EXCESSO,
                'label' => Mage::helper('adminhtml')->__('Simples Nacional (excesso de sublimite de receita bruta )')
            ),
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_CRT_REGIME_NORMAL,
                'label' => Mage::helper('adminhtml')->__('Regime Normal')
            ),
        );
    }
}
