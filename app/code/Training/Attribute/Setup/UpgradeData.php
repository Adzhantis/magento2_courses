<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Attribute\Setup;

use Magento\Catalog\Model\ResourceModel\Category\Collection;
use Magento\Directory\Model\Country;
use Training\Attribute\Model\CategoryCountriesFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{

    private $categoryCountriesFactory;
    private $categoryCollection;
    private $country;

    /**
     * UpgradeData constructor.
     * @param CategoryCountriesFactory $categoryCountriesFactory
     * @param Collection $categoryCollection
     * @param Country $country
     */
    public function __construct(
        CategoryCountriesFactory $categoryCountriesFactory,
        Collection $categoryCollection,
        Country $country
    ){
        $this->categoryCountriesFactory = $categoryCountriesFactory;
        $this->categoryCollection = $categoryCollection;
        $this->country = $country;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.1', '<')) {

            $countries = $this->getAllCountries($setup);
            $categories = $this->categoryCollection->getItems();
            $categoriesCount = count($this->categoryCollection->getItems());

            for ($a = 0; $a < 50; $a++) {

                $this->categoryCountriesFactory->create()->setData(
                    [
                        'country_id' => $countries[rand(0, 244)]['country_id'],
                        'category_id' => $categories[rand(1, $categoriesCount)]->getId(),
                    ]
                )->save();

            }
        }
    }

    /**
     * @param $setup
     * @return mixed
     */
    private function getAllCountries($setup):array {

        $connection = $setup->getConnection();

        $select = $connection->select();

        $select->from('directory_country', 'country_id');

        return $connection->fetchAll($select);
    }
}
