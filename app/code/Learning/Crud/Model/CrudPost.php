<?php

namespace Learning\Crud\Model;

class CrudPost    extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface  
{
    const CACHE_TAG = 'crud_post';

	protected $_cacheTag = 'crud_post';

	protected $_eventPrefix = 'crud_post';



	protected function _construct()
	{
		$this->_init('Learning\Crud\Model\ResourceModel\CrudPost');
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
?>