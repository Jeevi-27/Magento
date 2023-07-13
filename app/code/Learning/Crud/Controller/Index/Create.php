<?php
namespace Learning\Crud\Controller\Index;

class Create extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_crudpostFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Learning\Crud\Model\CrudPostFactory $_crudpostFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_crudpostFactory = $_crudpostFactory;
		return parent::__construct($context);
	}

	// public function execute()
	// {
	// 	$post = $this->_crudpostFactory->create();
	// 	$collection = $post->getCollection();
	// 	foreach($collection as $item){
	// 		echo "<pre>";
	// 		print_r($item->getData());
	// 		echo "</pre>";
	// 	}
	// 	exit();
	// 	return $this->_crudpostFactory->create();
	// }

	public function execute()
	{
		 return $this->_pageFactory->create();
	}
}