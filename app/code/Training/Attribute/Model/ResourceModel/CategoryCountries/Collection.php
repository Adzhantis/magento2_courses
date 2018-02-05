<?php

namespace Training\Attribute\Model\ResourceModel\CategoryCountries;

use \Training\Attribute\Model\CategoryCountries as Model;
use \Training\Attribute\Model\ResourceModel\CategoryCountries as ResourceModel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }

    /**
     * Add store id(s) filter to collection
     *
     * @param int|array $category_id
     * @return $this
     */
    public function addCategoryIdFilter($category_id)
    {
        return $this->addFieldToFilter('main_table.category_id', ['in' => $category_id]);
    }
}
