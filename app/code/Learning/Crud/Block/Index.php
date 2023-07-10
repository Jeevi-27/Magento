<?php

namespace Learning\Crud\Block;
 
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Index extends \Magento\Framework\View\Element\Template
{
     protected $_filesystem;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Learning\Crud\Model\CrudPostFactory $_crudpostFactory
          )
     {
          parent::__construct($context);
          $this->_crudpostFactory = $_crudpostFactory;
     }

     public function getResult()
     {
          $post = $this->_crudpostFactory->create();
          $collection = $post->getCollection();

          	// foreach($collection as $item){
          	// 	echo "<pre>";
          	// 	print_r($item->getData());
          	// 	echo "</pre>";
          	// }
          	// exit();

          return $collection;
     }
}