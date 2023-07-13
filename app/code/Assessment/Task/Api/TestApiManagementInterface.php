<?php
namespace Assessment\Task\Api;
interface TestApiManagementInterface
{
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Assessment\Task\Api\TestApiManagementInterface
     */
    public function getApiData(int $pageId = null);


   /**
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @param $created
     *  @return \Assessment\Task\Api\TestApiManagementInterface
     */
    public function save(string $sku, int $quoteId, int $customerId = null, $created = null);

/**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Assessment\Task\Api\TestApiManagementInterface
     */
    public function getById(int $id);

     /**
      *  @param int $id
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @param $created
     *  @return \Assessment\Task\Api\TestApiManagementInterface
     */
  

    public function update(int $id, string $sku, int $quoteId, int $customerId = null, $created = null);


/**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Assessment\Task\Api\TestApiManagementInterface
     */
    public function delete(int $id);
}

