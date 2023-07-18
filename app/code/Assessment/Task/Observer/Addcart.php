<?php
namespace Assessment\Task\Observer;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Customer\Model\SessionFactory;
use Assessment\Task\Model\TrackingProductFactory as TrackingProductModel;
use Assessment\Task\Model\ResourceModel\TrackingProduct as TrackingProductResource;



class Addcart implements ObserverInterface
{
    private $_checkoutSession;
    protected $session;
    
    private $model;

   

     private $resource;

    public function __construct(
        CheckoutSession $checkoutSession,
        SessionFactory $session,
        TrackingProductModel $model,
        TrackingProductResource $resource,
        \Magento\Framework\MessageQueue\PublisherInterface $publisher,
        \Magento\Framework\Json\Helper\Data $jsonHelper
    )
    {
        $this->_checkoutSession = $checkoutSession;
        $this->session= $session->create();
        $this->model = $model;
        $this->resource = $resource;
        $this->publisher = $publisher;
        $this->jsonHelper = $jsonHelper;
    }

    public function execute(EventObserver $observer)
    {
        // /** @var \Magento\Catalog\Model\Product $product */
        $product = $observer->getEvent()->getDataByKey('product');
        
        $quote = $this->_checkoutSession->getQuote()->getItemByProduct($product);
        
        $quote_id = $quote->getId();
        $sku = $product->getSku();
        $created = $this->_checkoutSession->getCreatedAt();
        $customer_id = ($this->session->isLoggedIn()) ? $this->session->getCustomerData()->getId() : Null;



        $model = $this->model->create();
        $model->setSku($sku);
        $model->setQuoteId($quote_id);
        $model->setCustomerId($customer_id);
        $model->setCreated($created);
        $this->resource->save($model);

        $data = [
            'sku' => $sku,
            'quote_id' => $quote_id,
            'customer_id' => $customer_id,
            'created' => $created,
        ];

        $this->publisher->publish(
            'assessmenttask.topic',
            $this->jsonHelper->jsonEncode($data)
        ); 
       
       
    }
}