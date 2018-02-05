<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\CustomerStore\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Customer setup factory
     *
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Init
     *
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /* @var CustomerSetup $customerSetup */
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $setup->startSetup();

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'pref_lang', [
            'type' => 'static',
            'label' => 'Preferred Language',
            'input' => 'select',
            'source' => \Magento\Customer\Model\Customer\Attribute\Source\Store::class,
            'sort_order' => 20,
            'visible' => true,
            'user_defined' => true,
            'system' => false,
            'required' => false,
            'group' => 'General'
        ]);

//        $prefLangAttribute = $customerSetup->getAttributeId(\Magento\Customer\Model\Customer::ENTITY, 'pref_lang');
        $prefLangAttribute = $customerSetup->getEavConfig()
            ->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'pref_lang');
//        $prefLangAttribute->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
//        $prefLangAttribute->save();

        $setup->getConnection()
            ->insertMultiple($setup->getTable('customer_form_attribute'), [
                ['form_code' => 'adminhtml_customer', 'attribute_id' => $prefLangAttribute->getId()],
                ['form_code' => 'customer_account_create', 'attribute_id' => $prefLangAttribute->getId()],
                ['form_code' => 'customer_account_edit', 'attribute_id' => $prefLangAttribute->getId()]
            ]);

        $setup->endSetup();
    }
}
