<?php
namespace Assessment\Task\Observer;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Customer\Model\SessionFactory;
class Addcart implements ObserverInterface
{
    private $_checkoutSession;
    protected $session;
    protected $_taskFactory;

    public function __construct(
        CheckoutSession $checkoutSession,
        SessionFactory $session,
        \Assessment\Task\Model\TaskFactory $_taskFactory
    )
    {
        $this->session= $session->create();
        $this->_taskFactory = $_taskFactory;
        $this->_checkoutSession = $checkoutSession;
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
        $data = [
            'sku'         => $sku,
            'customer_id' => $customer_id,
            'quote_id'    => $quote_id,
            'created' =>$created
        ];

        $form = $this->_taskFactory->create();
        $form->addData($data)->save();
       
    }
}