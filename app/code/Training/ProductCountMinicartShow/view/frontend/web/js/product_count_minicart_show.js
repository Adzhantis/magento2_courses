define([
    'uiComponent',
    'Magento_Customer/js/customer-data',
    'ko',
], function (Component, customerData, ko) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Training_ProductCountMinicartShow/product_count_minicart_show'
        },
        productShowData: customerData.get('product_count_minicart_show')
    });
});
