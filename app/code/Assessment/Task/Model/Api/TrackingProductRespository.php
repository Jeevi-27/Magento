<?php
namespace Assessment\Task\Model\Api;
use Magento\Framework\Exception\LocalizedException;
use Assessment\Task\Model\TrackingProductFactory as TrackingProductModel;
use Assessment\Task\Model\ResourceModel\TrackingProduct as TrackingProductResource;
use Assessment\Task\Model\ResourceModel\TrackingProduct\CollectionFactory;
use Assessment\Task\Api\DataInterfaceFactory;
use Assessment\Task\Api\TrackingProductInterface;
class TrackingProductRespository implements  TrackingProductInterface
{

     /**
     * @var DataInterfaceFactory
     */
    private $dataInterfaceFactory;

     /**
     * @var CollectionFactory
     */

    private $collectionFactory;

     /**
     * @var TrackingProductModel
     */
    private $model;

      /**
     * @var TrackingProductResource
     */

     private $resource;



    public function __construct(
        CollectionFactory $collectionFactory,   
        DataInterfaceFactory $dataInterfaceFactory,
        TrackingProductModel $model,
        TrackingProductResource $resource
    ) { 
        $this->collectionFactory = $collectionFactory;
        $this->dataInterfaceFactory = $dataInterfaceFactory;
        $this->model = $model;
        $this->resource = $resource;
    }
    /**
     * @param int|null $pageId
     * @return \Assessment\Task\Api\DataInterface[]
     */
    public function getApiData(int $pageId = null)
    {
        if ($pageId == null) {
            $pageId = 1;
        }
        $data=[];

        try {
                $collection = $this->collectionFactory->create()->setPageSize(5)->setCurPage($pageId);
            
                foreach ($collection as $item) {

                    $model = $this->model->create();
                    $model->setSku($item->getSku());
                    $model->setQuoteId($item->getQuoteId());
                    $model->setCustomerId($item->getCustomerId());
                    $model->setCreated($item->getCreated());
                    $data[] = $model;
                }
                return $data;

       
            } catch (LocalizedException $e) {
                throw $e;
            }
   
    }


     /**
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @return \Assessment\Task\Api\DataInterface[]
     */
    public function save(string $sku, int $quoteId, int $customerId = null)
    {
       
        $model = $this->model->create();
        $model->setSku($sku);
        $model->setQuoteId($quoteId);
        $model->setCustomerId($customerId);
       
        try {
            $this->resource->save($model);
            $response = ['success' => 'Saved Successfully'];
            return $response;
        } catch (LocalizedException $e) {
            throw $e;
        }

    }


     /**
     * @param int $id
     * @return \Assessment\Task\Api\DataInterface[]
     */

    public function getById(int $id)
    {
        try {
            if ($id) {
                $model = $this->model->create();
                $this->resource->load($model, $id, 'id');
                return $data = $model->getData();
                
            }
        } catch (LocalizedException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }

    }



     /**
     * @param string $id
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @return \Assessment\Task\Api\DataInterface[]
     */
    public function update(int $id, string $sku, int $quoteId, int $customerId = null )
    {


        $model = $this->model->create();
        $this->resource->load($model, $id, 'id');
        if(!$model->getData()){
            return ['success' => 'ID is not Available'];
        }
        if ($sku != null) {
            $model->setSku($sku);
        }

        if ($quoteId != null) {
            $model->setQuoteId($quoteId);
        }

        if ($customerId != null) {
            $model->setCustomerId($customerId);
        }

        
        try {
            $this->resource->save($model);
            return ['success' => 'Updated Successfully'];
        } catch (LocalizedException $e) {
            throw $e;
        }


   
       

    }


    /**
     * @param string $id
     * @return \Assessment\Task\Api\DataInterface
     */


    public function delete(int $id)
    {
        $model = $this->model->create();
        $this->resource->load($model, $id, 'id');

        if(!$model->getData()){
            return ['success' => 'ID is not Available'];
        }
        try {
            
                $this->resource->delete($model);
                return ['success' => true, 'message' => "Deleted Successfully"];
           
        } catch (LocalizedException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}