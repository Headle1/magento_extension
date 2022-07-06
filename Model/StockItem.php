<?php

namespace Headle\ApiExtension\Model;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\EntityManager\Operation\ExtensionInterface;

class StockItem implements ExtensionInterface
{
    /**
     * @var StockRegistryInterface
     */
    private $stockRegistry;

    public function __construct(
        StockRegistryInterface $stockRegistry
    ) {
        $this->stockRegistry = $stockRegistry;
    }


    public function execute($product, $arguments = [])
    {
        if ($product->getExtensionAttributes()->getStockItem() !== null) {
            return $product;
        }

        $stockItem =$this->stockRegistry->getStockItem($product->getId());
        $extensionAttributes = $product->getExtensionAttributes();
        $extensionAttributes->setStockItem($stockItem);
        $product->setExtensionAttributes($extensionAttributes);

        return $product;
    }
}
