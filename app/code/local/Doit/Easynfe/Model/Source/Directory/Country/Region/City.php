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
class Doit_Easynfe_Model_Source_Directory_Country_Region_City {

    /**
     * Retrieve NF-e cities
     *
     * @return array
     */
    public function toOptionArray(){
        //$mCity = Mage::getModel('doit_easynfe/directory_country_region_city')->getCollection();
        /* @var Doit_Easynfe_Model_Directory_Country_Region_Collection */
        /*
        if (count($mCity) > 0) {
            foreach ($mCity as $key => $cities) {

                $aResult[$key]['value'] = $cities->getId();
                $aResult[$key]['label'] = $cities->getName();
            }
        }
        return $aResult;
        */
        
        /**
         * result is loaded from ajax request filtered by region
         */
        return array();
      
    }

}
