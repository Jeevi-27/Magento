<?php

namespace Assessment\Task\Model\ResourceModel\TrackingClient;
use Assessment\Task\Model\TrackingClient as Model;
use Assessment\Task\Model\ResourceModel\TrackingClient as ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init(Model::class, ResourceModel::class);
        parent::_construct();
    }
}