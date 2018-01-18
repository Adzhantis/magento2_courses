<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Repository\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * Example factory
     *
     * @var ExampleFactory
     */
    private $exampleFactory;

    /**
     * InstallData constructor.
     * @param \Training\Repository\Model\ExampleFactory $exampleFactory
     */
    public function __construct(\Training\Repository\Model\ExampleFactory $exampleFactory)
    {
        $this->exampleFactory = $exampleFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        if (version_compare($context->getVersion(), '2.0.2', '<')) {

            for ($a = 0; $a < 50; $a++) {

                $example = $this->exampleFactory->create();

                $example->setData(
                    [
                        'example_name' => rand(100000, 999999),
                    ]
                )->save();

            }

        }
    }
}
