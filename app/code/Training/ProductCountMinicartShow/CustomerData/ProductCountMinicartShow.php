<?php

namespace Training\ProductCountMinicartShow\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Checkout\Helper\Data as CheckoutHelper;

/**
 * Customer section
 */
class ProductCountMinicartShow implements SectionSourceInterface
{
    const XML_PATH_CHECKOUT_MAX_ITEMS_DISPLAY_COUNT = 'checkout/options/max_items_display_count';

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
        $itemsCount = $this->checkoutSession->getQuote()->getItemsCount();
        $maxProductsMinicartShow = $this->scopeConfig->getValue(self::XML_PATH_CHECKOUT_MAX_ITEMS_DISPLAY_COUNT);
        $hasMinicartItems = $itemsCount > 0;
        $isFull = ($maxProductsMinicartShow - $itemsCount) === 0;
        $minicartAlreadyShowMax = ($maxProductsMinicartShow - $itemsCount) < 0;

        return [
            'has_minicart_items' => $hasMinicartItems,
            'is_full' => $isFull,
            'minicart_already_show_max' => $minicartAlreadyShowMax,
            'amount_left' => $maxProductsMinicartShow - $itemsCount,
        ];
    }
}
