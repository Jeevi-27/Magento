<?php
namespace Assessment\Task\Api;

interface TrackingClientInterface
{
   /**
     * @param int|null $pageId
     * @return \Assessment\Task\Api\DataInterface[]
     */
    public function getApiData(int $pageId = null);


   /**
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     *  @return \Assessment\Task\Api\DataInterface[]
     */
    public function save(string $sku, int $quoteId, int $customerId = null);


  /**
     * @param int $id
     * @return \Assessment\Task\Api\DataInterface[]
     */
    public function getById(int $id);

     /**
     * @param string $id
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @return \Assessment\Task\Api\DataInterface[]
     */
    public function update(int $id, string $sku, int $quoteId, int $customerId = null);

  /**
     * @param string $id
     * @return \Assessment\Task\Api\DataInterface[]
     */

    public function delete(int $id);
}

