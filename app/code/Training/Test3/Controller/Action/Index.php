<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Test3\Controller\Action;

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
         $this->getResponse()->appendBody("HELLO WORLD<hr><hr>");
         $this->getResponse()->appendBody("HELLO WORLD<hr><hr>");
         $this->getResponse()->appendBody("HELLO WORLD<hr><hr>");
         $this->getResponse()->appendBody("HELLO WORLD<hr><hr>");
        return $this->getResponse()->appendBody("HELLO WORLD<hr><hr>");
    }
}
