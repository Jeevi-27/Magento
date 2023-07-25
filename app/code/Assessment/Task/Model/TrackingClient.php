<?php
namespace Assessment\Task\Model;
use Magento\Framework\Model\AbstractModel;
use Assessment\Task\Model\ResourceModel\TrackingClient as ResourceModel;
class TrackingClient extends AbstractModel 
{ 
    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init(ResourceModel::class);
        parent::_construct();
    }
}