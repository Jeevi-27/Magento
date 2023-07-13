<?php
namespace Assessment\Task\Model\Api;
use Magento\Framework\Exception\LocalizedException;
class TestApiManagement implements \Assessment\Task\Api\TestApiManagementInterface
{
    const SEVERE_ERROR = 0;
    const SUCCESS = 1;
    const LOCAL_ERROR = 2;
    protected $_testApiFactory;
    public function __construct(
        \Assessment\Task\Model\TaskFactory $testApiFactory,
        \Assessment\Task\Model\ResourceModel\Task  $resource
    ) { 
        $this->_testApiFactory = $testApiFactory;
        $this->resource = $resource;
    }
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Webkul\TestApi\Api\Data\TestApiInterface
     */
    public function getApiData(int $pageId = null)
    {
        if ($pageId == null) {
            $pageId = 1;
        }

        $data = [];
       return $data = $this->_testApiFactory->create()->getCollection()->getData();
        $cartCollection = $this->_testApiFactory->create()->setPageSize(5)->setCurPage($pageId);

        print_r($cartCollection);

        foreach($cartCollection as $list)
        {
            return "sdf";
            return $cartCollection;
            return $list;
        }


      // return $data = $this->_testApiFactory->create()->getCollection()->getData();
        //return  $cartCollection = $this->_testApiFactory->create()->setPageSize(5)->setCurPa($pageId);
        // return $data = $this->_testApiFactory->create()->getCollection()->getData();
        // return "Sdf";
        // try {
        //     $model = $this->_testApiFactory
        //         ->create();
        //     if (!$model->getId()) {
        //         throw new \Magento\Framework\Exception\LocalizedException(
        //             __('no data found')
        //         );
        //     }
        //     return $model;
        // } catch (\Magento\Framework\Exception\LocalizedException $e) {
        //     $returnArray['error'] = $e->getMessage();
        //     $returnArray['status'] = 0;
        //     $this->getJsonResponse(
        //         $returnArray
        //     );
        // } catch (\Exception $e) {
        //     $this->createLog($e);
        //     $returnArray['error'] = __('unable to process request');
        //     $returnArray['status'] = 2;
        //     $this->getJsonResponse(
        //         $returnArray
        //     );
        // }
    }

    public function save(string $sku, int $quoteId, int $customerId = null, $created = null)
    {
        
        $data = [
            'sku'         => $sku,
            'customer_id' => $customerId,
            'quote_id'    => $quoteId,
            'created' => $created
        ];

        try {
            $form = $this->_testApiFactory->create();
            $form->addData($data)->save();
            $response = ['success' => 'Saved Successfully'];
            return $response;
        } catch (LocalizedException $e) {
            throw $e;
        }
    }

    public function getById(int $id)
    {

        
       
        try {
            if ($id) {
                 $data = $this->_testApiFactory->create()->load($id)->getData();
                return ['success' => true, 'message' => json_encode($data)];
            }
        } catch (LocalizedException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }

    }

    public function update(int $id, string $sku, int $quoteId, int $customerId = null, $created = null)
    {

        

        try {
            $form = $this->_testApiFactory->create();
            $this->resource->load($form, $id, 'id');
    
            if($sku)
            {
                $form->setData('sku', $sku);
            }
    
    
            if($customerId)
            {
                $form->setData('customer_id', $customerId);  
            }
    
            if($quoteId)
            {
                $form->setData('quote_id', $quoteId);
            }
    
            if($created)
            {
                $form->setData('created', $created);
            }
            $this->resource->save($form);
            $response = ['success' => 'Updated Successfully'];
            return $response;
        } catch (LocalizedException $e) {
            throw $e;
        }

    }


    public function delete(int $id)
    {

        try {
            if ($id) {
                 $data = $this->_testApiFactory->create()->load($id)->delete();
                return ['success' => true, 'message' => "Deleted Successfully"];
            }
        } catch (LocalizedException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }

    }
}