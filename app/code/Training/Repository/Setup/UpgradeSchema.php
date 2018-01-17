<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Repository\Setup;

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

            if (!$installer->getConnection()->isTableExists($installer->getTable('training_repository_example'))) {

                $table = $installer->getConnection()->newTable(
                    $installer->getTable('training_repository_example')
                )->addColumn(
                    'example_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'EXAMPLE ID'
                )->addColumn(
                    'example_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['unsigned' => true, 'nullable' => false, 'default' => true],
                    'EXAMPLE NAME'
                )->setComment(
                    'Example Table'
                );
                $installer->getConnection()->createTable($table);
            }

            $installer->endSetup();
        }

    }
}
