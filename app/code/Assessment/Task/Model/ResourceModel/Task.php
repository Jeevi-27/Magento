<?php

namespace Assessment\Task\Model\ResourceModel;


class Task extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    
    /**
     * Resource initialisation
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('tracking_product', 'id');
    }
}