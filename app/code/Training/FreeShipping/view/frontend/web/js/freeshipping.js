/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'uiComponent',
    'jquery',
    'Magento_Customer/js/customer-data',
    'ko'
], function (Component, $, customerData, ko) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Training_FreeShipping/freeshipping_test'
        },
        freeshippingData: customerData.get('freeshipping'),
//        is_freeshipping: false,
//        testValue: ko.observable(false),
//        amount_left: '$35',
        log: function () {
            console.log(customerData.get('freeshipping'));
//            testValue(true);
//            testValue = true;
//            testValue = ko.observable(false);
//            testValue(true);
//            var value = testValue();
            return true;
            
            
        }
    });
});
