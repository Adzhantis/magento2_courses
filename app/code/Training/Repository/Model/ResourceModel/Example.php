<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Repository\Model\ResourceModel;

/**
 * Example resource model
 */
class Example extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     *  example Table
     *
     * @var string
     */
    protected $_exampleTable;

    /**
     * Cache
     *
     * @var \Magento\Framework\Cache\FrontendInterface
     */
    protected $_cache;

    /**
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\App\CacheInterface $cache
     * @param string $connectionName
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\App\CacheInterface $cache,
        $connectionName = null
    ) {
        parent::__construct($context, $connectionName);
        $this->_cache = $cache->getFrontend();
    }

    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('training_repository_example', 'example_id');
        $this->_exampleTable = $this->getTable('training_repository_example');
    }

}
