<?php

namespace Training\Repository\Model\ResourceModel\Example;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Training\Repository\Model\Example::class,
            \Training\Repository\Model\ResourceModel\Example::class);
    }


    public function toOptionArray()
    {
        return $this->_toOptionArray('example_id', 'example_name');
    }
}
