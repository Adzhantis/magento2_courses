<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Js\Controller\Layout;

use \Magento\Store\Model\Store;
/**
 * Index controller
 *
 */
class Js extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;

    /**
     * @var \Magento\Store\Model\ResourceModel\Store\Collection
     */
    protected $_storeCollection;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\Collection
     */
    protected $_categoryCollection;

    /**
     * @var \Magento\Store\Model\Store
     */
    protected $_store;

    /**
     * Onepage constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection
     * @param \Magento\Catalog\Model\ResourceModel\Category\Collection $categoryCollection
     * @param Store $store
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection,
        \Magento\Catalog\Model\ResourceModel\Category\Collection $categoryCollection,
        \Magento\Store\Model\Store $store
    ) {
        $this->pageFactory = $pageFactory;
        $this->_storeCollection = $storeCollection;
        $this->_categoryCollection = $categoryCollection;
        $this->_store = $store;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->pageFactory->create();

    }
}
