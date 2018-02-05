<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Attribute\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.1', '<')) {

            $installer = $setup;

            $installer->startSetup();

            if (!$installer->getConnection()->isTableExists($installer->getTable('category_countries'))) {

                $table = $installer->getConnection()->newTable(
                    $installer->getTable('category_countries')
                )->addColumn(
                    'category_country_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'CATEGORY COUNTRY ID'
                )->addColumn(
                    'category_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false],
                    'CATEGORY ID'
                )->addColumn(
                    'country_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    2,
                    ['unsigned' => true, 'nullable' => false],
                    'Country Id in ISO-2'
                );
                $installer->getConnection()->createTable($table);
            }

            $installer->endSetup();
        }

    }
}
