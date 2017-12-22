<?php
namespace Training\Test\Observer;

use Magento\Framework\Event\ObserverInterface;

class LogPath implements ObserverInterface
{
    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    protected $redirect;

    /**
     * @var \Magento\Framework\App\ActionFlag
     */
    protected $_actionFlag;

    /**
     * @var \Magento\Framework\App\ActionFlag
     */
    protected $_logger;

    /**
     * LogPath constructor.
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     * @param \Magento\Framework\App\ActionFlag $actionFlag
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->redirect = $redirect;
        $this->_actionFlag = $actionFlag;
        $this->_logger = $logger;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getEvent()->getData('request');
        $pathInfo = $request->getPathInfo();

        $this->_logger->addDebug($pathInfo);
    }
}
