<?php

namespace Assessment\Task\Model;

use Magento\Framework\Model\AbstractModel;

use Assessment\Task\Model\ResourceModel\TrackingProduct as ResourceModel;
class TrackingProduct extends AbstractModel 
{
    /** Cache tag */
  //  const CACHE_TAG = 'tracking_product';

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

    // public function getIdentities()
	// {
	// 	return [self::CACHE_TAG . '_' . $this->getId()];
	// }

	// public function getDefaultValues()
	// {
	// 	$values = [];

	// 	return $values;
	// }

    }