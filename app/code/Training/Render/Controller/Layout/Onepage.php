<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Render\Controller\Layout;

use \Magento\Store\Model\Store;
/**
 * Index controller
 *
 */
class Onepage extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultFactory;

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
     * @param \Magento\Framework\View\Result\PageFactory $resultFactory
     * @param \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection
     * @param \Magento\Catalog\Model\ResourceModel\Category\Collection $categoryCollection
     * @param Store $store
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultFactory,
        \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection,
        \Magento\Catalog\Model\ResourceModel\Category\Collection $categoryCollection,
        \Magento\Store\Model\Store $store
    ) {
        $this->resultFactory = $resultFactory;
        $this->_storeCollection = $storeCollection;
        $this->_categoryCollection = $categoryCollection;
        $this->_store = $store;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        echo '<pre>';
        foreach ($this->_storeCollection as $key => $value) {

            var_dump($value->getName());

            $productCategories = $this
                ->_categoryCollection
                ->addIdFilter($value->getRootCategoryId())
                ->addFieldToSelect(['name','description']);

            foreach ($productCategories as $key2 => $category){
                var_dump($category->getName());
                var_dump($category->getDescription());
            }
        }
        die;
    }
}
