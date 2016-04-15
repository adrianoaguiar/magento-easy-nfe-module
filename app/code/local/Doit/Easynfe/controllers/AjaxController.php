<?php

/**
 * Easynfe - NF-e. 
 *
 * @title      Magento Easynfe NF-e
 * @category   General
 * @package    Easynfe_Nfe
 * @author     Indexa Development Team <desenvolvimento@indexainternet.com.br>
 * @copyright  Copyright (c) 2011 Indexa - http://www.indexainternet.com.br
 */

class Doit_Easynfe_AjaxController extends Mage_Core_Controller_Front_Action
{
    public function  loadAction(){
        
        $uf = $this->getRequest()->getParam('uf');
        $filter = $this->getRequest()->getParam('filter');
        
        if( $uf ){
            if( 'region' == $filter )
                $mCity = Mage::getModel('doit_easynfe/directory_country_region_city')->getCollection()->orderByName()->addRegionFilter( $uf );
            else
                $mCity = Mage::getModel('doit_easynfe/directory_country_region_city')->getCollection()->orderByName()->addNfRegionFilter( $uf );    
            if (count($mCity) > 0) {
                $key = 0;
                foreach ($mCity as $cities) {
                    $aResult[$key]['value'] = $cities->getId();
                    $aResult[$key]['label'] = $cities->getName();
                    
                    if( $filter && Mage::getStoreConfig('doit_easynfe/'.str_replace( '-', '/', $filter ) ) == $cities->getId()  )
                        $aResult[$key]['selected'] = true;
                    $key++;
                }
            }
        }
        
        $this->getResponse()->setBody( Zend_Json::encode(  $aResult ) );
    }
}