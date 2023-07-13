<?php

namespace Assessment\Task\Model;

use Magento\Framework\Model\AbstractModel;
class Task extends AbstractModel 
{
    /** Cache tag */
    const CACHE_TAG = 'tracking_product';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('Assessment\Task\Model\ResourceModel\Task');
    }

    public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

    }