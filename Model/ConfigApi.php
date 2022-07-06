<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model;

class ConfigApi implements \Headle\ApiExtension\Api\ConfigApiInterface
{
    private ResourceModel\CoreConfig\CollectionFactory $collectionFactory;

    /**
     * @param ResourceModel\CoreConfig\CollectionFactory $collectionFactory
     */
    public function __construct(\Headle\ApiExtension\Model\ResourceModel\CoreConfig\CollectionFactory $collectionFactory)
    {

        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return mixed
     */
    public function getcoreConfig()
    {
        header("Content-Type: application/json; charset=utf-8");
        $Collection = $this->collectionFactory->create();
        $response = ['status' => false, 'message' => 'Error while fetching data'];
        if (count($Collection->getData())) {
            $coreconfigList = $Collection->getData();
            $response = [$coreconfigList];
        } else {
            $response = ['status' => false, 'message' => 'No Data found'];
        }
        $response = json_encode($response);
        print_r($response, false);
        die();
    }
}
