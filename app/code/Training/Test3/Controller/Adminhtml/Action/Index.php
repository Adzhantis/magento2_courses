<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Test3\Controller\Adminhtml\Action;

/**
 * Index controller
 *
 */
class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultFactory;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultFactory
    ) {
        $this->resultFactory = $resultFactory;
        parent::__construct($context);
    }

    /**
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();

        if($this->_isAllowed()){
            return $this->getResponse()->appendBody("HELLO WORLD _isAllowed");
        }else{
            return $this->getResponse()->appendBody("HELLO WORLD3 _is not Allowed");
        }

    }

    /**
     * Check if admin has permissions to visit related pages
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int) $secret == 1;
    }

}
