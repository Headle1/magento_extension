<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Headle\ApiExtension\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface ProductalertstockManagementInterface
{

    /**
     * Return true if product Added to Alert.
     *
     * @param int $customerId
     * @param int $productId
     * @return bool true on success
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function add($customerId, $productId);


    /**
     * Return true if product Added to Alert.
     *
     * @param int $customerId
     * @param int $productId
     * @return bool true on success
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function delete($productId, $customerId);
}
