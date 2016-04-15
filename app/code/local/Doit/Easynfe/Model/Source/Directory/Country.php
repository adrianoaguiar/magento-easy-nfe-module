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

class Doit_Easynfe_Model_Source_Directory_Country
{
    /**
     * Retrieve NF-e coutries
     *
     * @return array
     */
    public function toOptionArray(){
        $mCountry = Mage::getModel('doit_easynfe/directory_country')->getCollection();
        /* @var Doit_Easynfe_Model_Directory_Country_Collection */

        if (count($mCountry) > 0) {
            foreach ($mCountry as $key => $countries) {

                $aResult[$key]['value'] = $countries->getId();
                $aResult[$key]['label'] = Mage::app()->getLocale()->getCountryTranslation($countries->getCountryId());
            }
        }

        return $aResult;
    }
}
