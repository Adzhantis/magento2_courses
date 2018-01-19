<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Attribute\Model\ResourceModel;

/**
 * Example resource model
 */
class CategoryCountries extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     *  example Table
     *
     * @var string
     */
    protected $_category_countries_Table;

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
        $this->_init('category_countries', 'category_country_id');
        $this->_category_countries_Table = $this->getTable('category_countries');
    }

}
