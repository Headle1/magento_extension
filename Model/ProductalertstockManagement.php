<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Headle\ApiExtension\Model;

use Headle\ApiExtension\Api\ProductalertstockManagementInterface;
use Magento\Catalog\Model\Product;
use Magento\ProductAlert\Model\Stock;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\ProductAlert\Model\StockFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductalertstockManagement implements ProductalertstockManagementInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;
    /**
     * @var StockFactory
     */
    private $stockFactory;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        StoreManagerInterface $storeManager,
        StockFactory $stockFactory
    ) {
        $this->productRepository = $productRepository;
        $this->storeManager = $storeManager;
        $this->stockFactory = $stockFactory;
    }

    public function delete($productId, $customerId)
    {
        try {
            /* @var $product Product */
            $product = $this->productRepository->getById($productId);
            $model = $this->stockFactory->create()
                ->setCustomerId($customerId)
                ->setProductId($product->getId())
                ->setWebsiteId(
                    $this->storeManager
                        ->getStore()
                        ->getWebsiteId()
                )->setStoreId(
                    $this->storeManager
                        ->getStore()
                        ->getId()
                )
                ->loadByParam();
            if ($model->getId()) {
                $model->delete();
            }
            return true;
        } catch (NoSuchEntityException $noEntityException) {
            return false;
        }
    }

    public function add($customerId, $productId)
    {
        try {
            /* @var $product Product */
            $product = $this->productRepository->getById($productId);
            $store = $this->storeManager->getStore();
            /** @var Stock $model */
            $model = $this->stockFactory->create()
                ->setCustomerId($customerId)
                ->setProductId($product->getId())
                ->setWebsiteId($store->getWebsiteId())
                ->setStoreId($store->getId());
            $model->save();
            return true;
        } catch (NoSuchEntityException $noEntityException) {
            return false;
        }
    }
}
