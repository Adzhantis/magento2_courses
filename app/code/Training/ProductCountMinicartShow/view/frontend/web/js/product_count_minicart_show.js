/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

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
        logMinicart: function() {
            console.log(customerData.get('productcountminicartshow'));
        }
    });
});
