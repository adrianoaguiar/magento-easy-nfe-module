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


class Doit_Easynfe_Model_Resource_Sales_Order_Collection extends Doit_Easynfe_Model_Resource_Db_Collection_Abstract{
    
    /**
     * Initialize resource
     *
     */
    public function _construct(){
        $this->_init('doit_easynfe/sales_order');
    }
    
    /**
     * Filter NF By order Id
     *
     * @param string|array $id
     * 
     * @return Doit_Easynfe_Model_Resource_Sales_Order_Collection
     */
    public function addOrderFilter($id){
        if (!empty($id)) {
            if (is_array($id)) {
                $this->addFieldToFilter('main_table.order_id', array('in' => $id));
            } else {
                $this->addFieldToFilter('main_table.order_id', $id);
            }
        }
        return $this;
    }
    
}

