<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model\ResourceModel\CoreConfig;

use Headle\ApiExtension\Model\CoreConfig as Model;
use Headle\ApiExtension\Model\ResourceModel\CoreConfig as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'core_config_data_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
