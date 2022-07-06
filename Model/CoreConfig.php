<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model;

use Headle\ApiExtension\Model\ResourceModel\CoreConfig as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class CoreConfig extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'core_config_data_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
