<?php
namespace Assessment\Task\Api;
interface TaskInterface
{
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Assessment\Task\Api\TaskInterface
     */
    public function getApiData(int $pageId = null);


   /**
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @param $created
     *  @return \Assessment\Task\Api\TaskInterface
     */
    public function save(string $sku, int $quoteId, int $customerId = null);

/**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Assessment\Task\Api\TaskInterface
     */
    public function getById(int $id);

     /**
      *  @param int $id
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @param $created
     *  @return \Assessment\Task\Api\TaskInterface
     */
  

    public function update(int $id, string $sku, int $quoteId, int $customerId = null);


/**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Assessment\Task\Api\TaskInterface
     */
    public function delete(int $id);
}

