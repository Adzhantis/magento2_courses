<?php

namespace Training\Attribute\Model;

class CategoryCountries extends \Magento\Framework\Model\AbstractModel
{

    protected $searchCriteria;
    protected $countries;
    protected $filter;
    protected $filterGroup;
    protected $categoryCountriesRepository;

    /**
     * CategoryCountries constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @param \Magento\Framework\Registry $registry
     * @param ResourceModel\CategoryCountries $resource
     * @param ResourceModel\CategoryCountries\Collection $resourceCollection
     * @param CategoryCountriesRepository $categoryCountriesRepository
     * @param \Magento\Framework\Api\Filter $filter
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
        \Magento\Framework\Registry $registry,
        ResourceModel\CategoryCountries $resource,
        ResourceModel\CategoryCountries\Collection $resourceCollection,
        CategoryCountriesRepository $categoryCountriesRepository,
        \Magento\Framework\Api\Filter $filter,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup,
        array $data = []
    )
    {
        $this->filter = $filter;
        $this->searchCriteria = $searchCriteria;
        $this->filterGroup = $filterGroup;
        $this->categoryCountriesRepository = $categoryCountriesRepository;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\CategoryCountries::class);
    }

    public function getCategoryCountries($categoryId)
    {
        if (null === $this->countries) {
            $criteria = $this->searchCriteria->create();

            $filterProduct = $this->filter
                ->setField("categoryId")
                ->setValue($categoryId)
                ->setConditionType("eq");

            $this->filterGroup->setFilters([$filterProduct]);
            $this->searchCriteria->setFilterGroups([$this->filterGroup]);
            $this->countries = $this->categoryCountriesRepository->getList($criteria);
        }
        return $stockItem;
    }
}