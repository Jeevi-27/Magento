<?php

namespace Assessment\Task\Consumer;

use _PHPStan_76800bfb5\Composer\CaBundle\CaBundle;
use Magento\Framework\Serialize\SerializerInterface;
use Assessment\Task\Model\TrackingClientFactory;

class Addcart
{ 
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var TrackingClientFactory
     */
    protected $model;
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(
        SerializerInterface $serializer,
        TrackingClientFactory $model
    ) {
        $this->serializer = $serializer;
        $this->model = $model;
    }

    /**
     * @param $data
     * @return void
     */
    public function consume($data)
    {
        $model = $this->model->create();
        $unserialarr = $this->serializer->unserialize($data);
       
        try {
            $model->addData($unserialarr)->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}