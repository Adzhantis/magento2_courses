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
     * @var \Magento\Store\Model\Store
     */
    protected $_store;

    /**
     * Onepage constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultFactory
     * @param \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection
     * @param \Magento\Store\Model\Store $store
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultFactory,
        \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection,
        \Magento\Store\Model\Store $store
    ) {
        $this->resultFactory = $resultFactory;
        $this->_storeCollection = $storeCollection;
        $this->_store = $store;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {

        //$storeId = $this->_store->getRootCategoryId();
        //$storeCollection->addIdFilter($storeId);

        echo '<pre>'; var_dump($this->_storeCollection);die;
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
        return $this->getResponse();
    }
}
