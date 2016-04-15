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

class Doit_Easynfe_Block_Adminhtml_Sales_Order_Nfe extends Mage_Adminhtml_Block_Template
{
    
    public function __construct() {
        /**
         * check if NF-e module is enabled
         */
        parent::__construct();
        
        if ( !Mage::getStoreConfig('doit_easynfe/geral/status') ){
            return ;
        }
        
        /**
         * set NF-e template
         */
        $this->setTemplate('doit_easynfe/sales/order/nfe.phtml');
    }    
    
    public function getOrderId(){
        if(Mage::registry('current_order'))
            return Mage::registry('current_order')->getId();
    }
    
    public function getNf(){
        /**
         * nf collection
         */
        if($this->getOrderId())
            return Mage::getModel('doit_easynfe/sales_order')->getCollection()->addOrderFilter( $this->getOrderId() );
        else
            return false;
    }
    
    public function getNfCollection( $id ){
        /**
         * nf collection
         */
        return Mage::getModel('doit_easynfe/sales_order_nf')->getCollection()->addNfFilter( $id );
    }
    
    public function getRequestCollection( $id ){
        /**
         * nf collection
         */
        return Mage::getModel('doit_easynfe/sales_order_request')->getCollection()->addNfFilter( $id );
    }
    
    public function getLastErrorId( $id ){
        return Mage::getModel('doit_easynfe/sales_order_request')->getCollection()->addNfFilter( $id )
                    ->addStatusFilter( Doit_Easynfe_Helper_Data::NFE_SHIPMENT_STATUS_ERROR )->getLastItem()->getId();
    }
    
    public function getLastFinishedId( $id ){
        return Mage::getModel('doit_easynfe/sales_order_request')->getCollection()->addNfFilter( $id )
                    ->addStatusFilter( array( Doit_Easynfe_Helper_Data::NFE_SHIPMENT_STATUS_FINISHED,Doit_Easynfe_Helper_Data::NFE_SHIPMENT_STATUS_PROCESSING) )->getLastItem()->getId();
    }
    
    
}
