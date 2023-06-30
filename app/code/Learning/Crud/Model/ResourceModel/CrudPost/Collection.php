<?php
namespace Learning\Crud\Model\ResourceModel\CrudPost;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'learning_curd_crudpost_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Learning\Crud\Model\CrudPost', 'Learning\Crud\Model\ResourceModel\CrudPost');
	}

}
