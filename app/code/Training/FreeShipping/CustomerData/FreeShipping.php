<?php

namespace Training\FreeShipping\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Checkout\Helper\Data as CheckoutHelper;

/**
 * Customer section
 */
class FreeShipping implements SectionSourceInterface
{
    const XML_PATH_FREE_SHIPPING_SUBTOTAL = 'carriers/freeshipping/free_shipping_subtotal';

    /**
     * @var CheckoutSession
     */
    protected $checkoutSession;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var CheckoutHelper
     */
    protected $checkoutHelper;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param CheckoutSession $checkoutSession
     * @param CheckoutHelper $checkoutHelper
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        CheckoutSession $checkoutSession,
        CheckoutHelper $checkoutHelper
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->checkoutSession = $checkoutSession;
        $this->checkoutHelper = $checkoutHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function getSectionData()
    {
        $subtotal = $this->checkoutSession->getQuote()->getBaseSubtotal();
        $freeShippingSubtotal = $this->scopeConfig->getValue(self::XML_PATH_FREE_SHIPPING_SUBTOTAL);
        return [
            'is_freeshipping' => $freeShippingSubtotal <= $subtotal,
            'amount_left' => $this->checkoutHelper->formatPrice($freeShippingSubtotal - $subtotal),
        ];
    }
}
