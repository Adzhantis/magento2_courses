<?php

namespace Training\Repository\Model;

class Example extends \Magento\Framework\Model\AbstractModel
{

    /**
     * Example constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceModel\Example $resource
     * @param ResourceModel\Example\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ResourceModel\Example $resource,
        ResourceModel\Example\Collection $resourceCollection,
        array $data = []
    )
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\Example::class);
    }
}