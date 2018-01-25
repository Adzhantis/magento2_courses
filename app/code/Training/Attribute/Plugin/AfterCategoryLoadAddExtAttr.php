<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Attribute\Plugin;

use Magento\Catalog\Api\Data\CategoryExtensionFactory;
use Magento\Catalog\Api\Data\CategoryExtensionInterface;
/**
 * @deprecated 100.2.0 Stock Item as a part of ExtensionAttributes is deprecated
 * @see StockItemInterface when you want to change the stock data
 * @see StockStatusInterface when you want to read the stock data for representation layer (storefront)
 * @see StockItemRepositoryInterface::save as extension point for customization of saving process
 */
class AfterCategoryLoadAddExtAttr
{

    protected $extensionFactory;
    protected $categoryCountriesModel;
    public function __construct(
        CategoryExtensionFactory $extensionFactory,
        \Training\Attribute\Model\CategoryCountries $categoryCountriesModel
    ){
        $this->extensionFactory = $extensionFactory;
        $this->categoryCountriesModel = $categoryCountriesModel;
    }

    public function afterLoad(\Magento\Catalog\Model\Category $category) {
        $categoryExtension = $category->getExtensionAttributes();
        $categoryExtension->setCategoryCountries($this->categoryCountriesModel->getCategoryCountries($category));
        $category->setExtensionAttributes($categoryExtension);
        return $category;
    }

    public function afterGetExtensionAttributes(\Magento\Catalog\Model\Category $category, CategoryExtensionInterface $extension = null){
        if ($extension === null) {
            $extension = $this->extensionFactory->create();
        }

        return $extension;
    }
}
