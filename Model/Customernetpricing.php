<?php
declare(strict_types=1);
namespace Headle\ApiExtension\Model;

use Headle\ApiExtension\Model\ResourceModel\Customernetpricing as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Customernetpricing extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'xlii_customernetpricing_model';

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
