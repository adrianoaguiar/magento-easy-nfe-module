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

class Doit_Easynfe_Model_Source_Config_Tpemis
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
                'value' => Doit_Easynfe_Helper_Data::NFE_TPEMIS_NORMAL,
                'label' => Mage::helper('adminhtml')->__('Normal')
            ),
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_TPEMIS_CONTINGENCIA_FS,
                'label' => Mage::helper('adminhtml')->__('Contingência FS')
            ),
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_TPEMIS_CONTINGENCIA_SCAN,
                'label' => Mage::helper('adminhtml')->__('Contingência SCAN')
            ),
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_TPEMIS_CONTINGENCIA_DPEC,
                'label' => Mage::helper('adminhtml')->__('Contingência DPEC')
            ),
            array(
                'value' => Doit_Easynfe_Helper_Data::NFE_TPEMIS_CONTINGENCIA_FS_DA,
                'label' => Mage::helper('adminhtml')->__('Contingência FS-DA')
            )
        );
    }
}
