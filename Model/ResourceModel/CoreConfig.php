<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CoreConfig extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'core_config_data_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('core_config_data', 'config_id');
        $this->_useIsObjectNew = true;
    }
}
