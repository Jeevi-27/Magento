<?php
namespace Assessment\Task\Api;
interface TaskInterface
{
   
    /**
     * @return string
     */
    public function getList(int $pageId = null);

  /**
     * GET for Post api
     * @param string $title
     * @return string
     */
    public function save($data);

      /**
     * @param int $id
     * @return string
     */
    public function getById($id);
 
    /**
     * GET for Post api
     * @param string $data
     * @return string
     */
    public function update($data);
    /**
     * @param int $id
     * @return bool true on success
     */
    public function delete($id);

}
 
  