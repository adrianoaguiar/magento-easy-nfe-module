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

class Doit_Easynfe_Model_Source_Directory_Country_Region
{
    /**
     * Retrieve NF-e regions
     *
     * @return array
     */
    public function toOptionArray(){
        
        $mRegion = Mage::getModel('doit_easynfe/directory_country_region')->getCollection();
        /* @var Doit_Easynfe_Model_Directory_Country_Region_Collection */

        if (count($mRegion) > 0) {
            foreach ($mRegion as $key => $regions) {

                $aResult[$key]['value'] = $regions->getId();
                $aResult[$key]['label'] = Mage::getModel('directory/region')->load( $regions->getRegionId() )->getDefaultName();
            }
        }

        return $aResult;
    }
}
