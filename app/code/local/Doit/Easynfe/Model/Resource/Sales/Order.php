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


class Doit_Easynfe_Model_Resource_Sales_Order extends Doit_Easynfe_Model_Resource_Db_Abstract{
    
    /**
     * Initialize resource
     *
     */
    public function _construct(){
        $this->_init('doit_easynfe/sales_order', 'id');
    }
}

