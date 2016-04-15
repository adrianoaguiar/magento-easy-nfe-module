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

class Doit_Easynfe_Model_Source_Config_Tpnf
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
                'value' => Doit_Easynfe_Helper_Data::NFE_TPNF_ENTRADA,
                'label' => Mage::helper('adminhtml')->__('Entrada')
            ),
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_TPNF_SAIDA,
                'label' => Mage::helper('adminhtml')->__('Saída')
            )
        );
    }
}
