<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Attribute\Controller\Index;

use \Magento\Store\Model\Store;
/**
 * Index controller
 *
 */
class Collection extends \Magento\Framework\App\Action\Action
{

    protected $pageFactory;
    protected $productCollectionFactory;

    /**
     *
    1. Работа с коллекцией продуктов

    1.1. Создать новый атрибут “Material” типа multiselect (Plastic, Steel, Glass)
    1.2. Добавить его в атрибут-сет “Default”
    1.3. Добавить три продукта для этого атрибут-сета и выбрать по несколько значений атрибута “Material”
    1.4. Получить все продукты из стали

     * Onepage constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param Store $store
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->productCollectionFactory = $productCollectionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addAttributeToFilter('material',  array('finset' => ['10']));
        $productCollection->addAttributeToSelect('material');

        foreach ($productCollection as $product) {
            var_dump($product->getData('material'));
        }

        return $this->pageFactory->create();
    }
}
