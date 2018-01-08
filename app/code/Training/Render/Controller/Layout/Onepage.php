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
     * @var \Magento\Store\Model\ResourceModel\Store\CollectionFactory
     */
    protected $_storeCollectionFactory;

    /**
     * Onepage constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultFactory
     * @param \Magento\Store\Model\ResourceModel\Store\CollectionFactory $storeCollectionFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultFactory,
        \Magento\Store\Model\ResourceModel\Store\CollectionFactory $storeCollectionFactory
    ) {
        $this->resultFactory = $resultFactory;
        $this->_storeCollectionFactory = $storeCollectionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {

        //$store = $this->_storeCollectionFactory->create();
        //echo '<pre>'; var_dump(get_class($store), get_class($this->_storeCollectionFactory));die;
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
        return $this->getResponse();
    }
}
