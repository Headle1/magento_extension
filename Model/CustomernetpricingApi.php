<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model;

use Headle\ApiExtension\Model\ResourceModel\Customernetpricing\CollectionFactory;

class CustomernetpricingApi implements  \Headle\ApiExtension\Api\CustomernetpricingApiInterface
{
    /**
     * @var ResourceModel\Customernetpricing\CollectionFactory
     */
    private  $collectionFactory;

    /**
     * @param ResourceModel\Customernetpricing\CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory){

        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return mixed
     */
    public function getCutomerprincing()
    {
        header("Content-Type: application/json; charset=utf-8");
        $Collection = $this->collectionFactory->create();
        $response = ['status' => false, 'message' => 'Error while fetching data'];
        if (count($Collection->getData())) {
            $customernetpricing = $Collection->getData();
            $response = $customernetpricing;
        } else {
            $response = ['status' => false, 'message' => 'No Data found'];
        }
        $response = json_encode($response);
        print_r($response, false);
        die();
    }
}
