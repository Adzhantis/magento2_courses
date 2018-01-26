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
class Repository extends \Magento\Framework\App\Action\Action
{

    protected $pageFactory;
    protected $productRepository;
    protected $searchCriteria;
    protected $filter;
    protected $filterGroup;

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
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\Filter $filter,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup
    ) {
        $this->pageFactory = $pageFactory;
        $this->filterGroup = $filterGroup;
        $this->productRepository = $productRepository;
        $this->filter = $filter;
        $this->searchCriteria = $searchCriteria;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        $materialFilter = $this->filter
            ->setField('material')
            ->setValue(10)
            ->setConditionType('finset');

        $this->filterGroup->setFilters([$materialFilter]);
        $this->searchCriteria->setFilterGroups([$this->filterGroup]);

        $products = $this->productRepository->getList($this->searchCriteria);

        foreach($products->getItems() as $product){
            echo '<pre>'; var_dump($product->getData('material'));
        }
        die;

        return $this->pageFactory->create();
    }
}
