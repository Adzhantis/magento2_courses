<?php

namespace Unit4\Database\Observer;

use Magento\Framework\Event\ObserverInterface;

class LogProductChanges implements ObserverInterface
{
    /**
     * @var null|\Psr\Log\LoggerInterface
     */
    protected $_logger = null;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();

        $this->_logger->addDebug('--------\n\n\n $product \n\n\n ' . get_class($product));
    }

}