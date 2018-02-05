<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Repository\Controller\Index;

/**
 * Index controller
 *
 */
class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    protected $productRepository;
    protected $searchCriteria;
    protected $sortOrder;
    protected $filter;
    protected $filterGroup;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @param \Magento\Framework\Api\SortOrder $sortOrder
     * @param \Magento\Framework\Api\Filter $filter
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
         \Magento\Framework\Api\SortOrder $sortOrder,
        \Magento\Framework\Api\Filter $filter,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup
    ) {
        $this->pageFactory = $pageFactory;
        $this->productRepository = $productRepository;
        $this->searchCriteria = $searchCriteria;
        $this->sortOrder = $sortOrder;
        $this->filter = $filter;
        $this->filterGroup = $filterGroup;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute() {

        $filterName = $this->filter
            ->setField("name")
            ->setValue("%n%")
            ->setConditionType("like");

        $filterWeight = $this->filter
            ->setField("weight")
            ->setValue("1")
            ->setConditionType("eq");

        $this->filterGroup->setFilters([$filterName, $filterWeight]);

        $this->sortOrder
            ->setField("name")
            ->setDirection("ASC");

        $this->searchCriteria
            ->setFilterGroups([$this->filterGroup])
            ->setSortOrders([$this->sortOrder]);

        $this->searchCriteria->setPageSize(6); //retrieve 6 or less entities

        $products = $this->productRepository->getList($this->searchCriteria);

        foreach ($products->getItems() as $product) {
            var_dump($product->getName());
            var_dump($product->getWeight());
        } //var_dump($products);
        die;

    }
}
