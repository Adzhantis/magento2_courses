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
class AfterCategorySaveExtAttr
{

    protected $extensionFactory;
    protected $categoryCountriesFactory;
    protected $categoryCountriesRepositoryFactory;
    public function __construct(
        CategoryExtensionFactory $extensionFactory,
        \Training\Attribute\Model\CategoryCountriesFactory $categoryCountriesFactory,
        \Training\Attribute\Model\CategoryCountriesRepositoryFactory $categoryCountriesRepositoryFactory
    ){
        $this->extensionFactory = $extensionFactory;
        $this->categoryCountriesFactory = $categoryCountriesFactory;
        $this->categoryCountriesRepositoryFactory = $categoryCountriesRepositoryFactory;
    }

    public function afterSave(\Magento\Catalog\Model\Category $category) {

        $repository = $this->categoryCountriesRepositoryFactory->create();

        $model = $this->categoryCountriesFactory->create();
        $oldCountries = $model->getByCategory($category);
        foreach ($oldCountries as $country){
            $repository->delete($country);
        }

        foreach ($category->getData('category_countries') as $country_id) {
            $model = $this->categoryCountriesFactory->create();
            $model->setData('category_id', $category->getId());
            $model->setData('country_id', $country_id);
           // var_dump($model->getData());die;

            $repository->save($model);
        }

       // var_dump($categoryExtension->getCategoryCountries(), $category->getData('category_countries'));die;//$categoryExtension->getCategoryCountries(),
        return $category;
    }

}
