<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Customernetpricing extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'xlii_customernetpricing_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('xlii_customernetpricing', 'id');
        $this->_useIsObjectNew = true;
    }
}
