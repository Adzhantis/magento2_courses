<?php

namespace Training\FreeShipping\Block\Product;

class FreeShipping extends \Magento\Catalog\Block\Product\View
{
    const XML_PATH_FREE_SHIPPING_SUBTOTAL = 'carriers/freeshipping/free_shipping_subtotal';

    public function canShow()
    {
        $freeShippingSubtotal = $this->_scopeConfig->getValue(self::XML_PATH_FREE_SHIPPING_SUBTOTAL);
        return $this->getProduct()->getFinalPrice() >= $freeShippingSubtotal;
    }
}
