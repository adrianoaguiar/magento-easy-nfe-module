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
class Doit_Easynfe_Model_Observer extends Mage_Core_Model_Abstract {

    /**
     * @var string
     */
    const NFE_BLOCK_SALES_ORDER_VIEW_INFO = 'Mage_Adminhtml_Block_Sales_Order_View_Info';
    
    /**
     *  Add a new relation for create NFs based on order
     * 
     * @param Doit_Easynfe_Model_Observer $observer 
     */
    public function salesOrderSaveNf($observer) {
        /**
         * register new nfe order to process
         */
        $mNfeOrder = Mage::getModel('doit_easynfe/sales_order');
        /* @var $mNfeOrder Doit_Easynfe_Model_Sales_Order */

        /**
         * prepare data
         */
        $aOrderData['order_id'] = $observer->getOrder()->getId();

        $mNfeOrder->setData($aOrderData);
        $mNfeOrder->save();
    }

    /**
     * Add a new relation with shipment for process NF-e 
     * 
     * @param Doit_Easynfe_Model_Observer $observer
     */
    public function salesOrderShipmentSaveAfter($observer) {
        /**
         * get last saved shipment 
         */
        $mCurrentShipment = Mage::registry('current_shipment');

        $mNfeOrderNf = Mage::getModel('doit_easynfe/sales_order_nf');
        /* @var $mNfeOrderNf Doit_Easynfe_Model_Sales_Order_Nf */

        $nfId = Mage::getModel('doit_easynfe/sales_order')->load($mCurrentShipment->getOrder()->getId(), 'order_id')->getId();
        
        if( !$nfId ){
            return $this;
        }
        /**
         * prepare data
         */
        $aNfData['nf_order_id'] = $nfId;
        $aNfData['shipment_id'] = $mCurrentShipment->getId();
        $aNfData['status'] = Doit_Easynfe_Helper_Data::NFE_SHIPMENT_STATUS_CREATED;
        $aNfData['created_at'] = date('Y-m-d H:i:s');
        
        $mNfeOrderNf->setData($aNfData);
        $mNfeOrderNf->save();
    }

    /**
     * Starts processing NF-e 
     */
    public function nfeProcess() {
        if ( !Mage::getStoreConfig('doit_easynfe/geral/status') ){
            return $this;
        }

        Mage::getModel('doit_easynfe/nfe')->execute();
    }
    
    /**
     * Update NF-e Information
     */
    public function updateInfo() {
        if ( !Mage::getStoreConfig('doit_easynfe/geral/status') ){
            return $this;
        }
        Mage::getModel('doit_easynfe/nfe')->updateInfo();
    }
    
     /**
     * Save xml and pdf files 
     */
    public function saveFiles() {
        Mage::getModel('doit_easynfe/nfe')->saveFiles();
    }
    
    /**
     * add custom quote item attributes
     * 
     * @param Doit_Easynfe_Model_Observer $observer 
     */
    public function salesQuoteAddItem( $observer ){
        /**
         * get params from observer
         */
        $quoteItem = $observer->getQuoteItem();
        
        /**
         * load product
         */
        $mProduct = Mage::getModel('catalog/product')->load( $quoteItem->getProductId() );
        
        /**
         * set quote items params
         */
        
        $quoteItem->setNfeNcm( $mProduct->getNfeNcm() );
        $quoteItem->setNfeUcom( $mProduct->getNfeUcom() );
        $quoteItem->setNfeOrig( $mProduct->getNfeOrig() );
//        
    }
    
    
    public function salesOrderNfeBlock( $observer ){
        
        if( get_class( $observer->getBlock() ) == self::NFE_BLOCK_SALES_ORDER_VIEW_INFO ){            
            $observer->getTransport()->setHtml( $observer->getTransport()->getHtml() 
                                              . $observer->getBlock()->getLayout()->createBlock('doit_easynfe/adminhtml_sales_order_nfe')->toHtml() 
            );
        }
    }
    
    public function formatAddress( $observer ){
     
        $address = $observer->getAddress();
        if( is_object($address)  && is_numeric( $address->getCity() ) ){
            $address->setCity( Mage::getModel('doit_easynfe/directory_country_region_city')->load( $address->getCity())->getName() );
        }
	return $this;
    }
    
}
