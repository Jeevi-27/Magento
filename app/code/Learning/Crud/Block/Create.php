<?php

namespace Learning\Crud\Block;
 
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Create extends \Magento\Framework\View\Element\Template
{
     protected $_crudpostFactory;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Learning\Crud\Model\CrudPostFactory $_crudpostFactory
          )
     {
          parent::__construct($context);
          $this->_crudpostFactory = $_crudpostFactory;
     }


     public function getActionUrl()
     {
        return $this->getUrl('crud/index/save', ['_secure' => true]);
     }
 
 
     public function execute()
     {
          return $this->_crudpostFactory->create();
     }
}