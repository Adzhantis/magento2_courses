<?php

namespace Training\FreeShipping\Block;

class FreeShipping extends \Magento\Framework\View\Element\Template
{
    const XML_PATH_FREE_SHIPPING_SUBTOTAL = 'carriers/freeshipping/free_shipping_subtotal';

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = array()
    ) {
        parent::__construct($context, $data);
        $this->checkoutSession = $checkoutSession;
    }

    public function isFreeShipping()
    {
        $subtotal = $this->checkoutSession->getQuote()->getBaseSubtotal();
        $freeShippingSubtotal = $this->_scopeConfig->getValue(self::XML_PATH_FREE_SHIPPING_SUBTOTAL);
        return $freeShippingSubtotal <= $subtotal;
    }

    public function amountLeft()
    {
        var_dump($this->checkoutSession->getQuoteId());
        $subtotal = $this->checkoutSession->getQuote()->getBaseSubtotal();
        $freeShippingSubtotal = $this->_scopeConfig->getValue(self::XML_PATH_FREE_SHIPPING_SUBTOTAL);
        return $freeShippingSubtotal - $subtotal;
    }
}
