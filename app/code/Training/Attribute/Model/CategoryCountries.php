<?php

namespace Training\Attribute\Model;

class CategoryCountries extends \Magento\Framework\Model\AbstractModel
{

    /**
     * Example constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceModel\CategoryCountries $resource
     * @param ResourceModel\CategoryCountries\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ResourceModel\CategoryCountries $resource,
        ResourceModel\CategoryCountries\Collection $resourceCollection,
        array $data = []
    )
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\CategoryCountries::class);
    }
}