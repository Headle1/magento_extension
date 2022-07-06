<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model\ResourceModel\Customernetpricing;

use Headle\ApiExtension\Model\Customernetpricing as Model;
use Headle\ApiExtension\Model\ResourceModel\Customernetpricing as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'xlii_customernetpricing_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
