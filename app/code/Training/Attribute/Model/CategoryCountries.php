<?php

namespace Training\Attribute\Model;

use Magento\Catalog\Api\Data\CategoryInterface;
use \Magento\Catalog\Model\Category\Interceptor;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Api\SearchResultsInterface;

class CategoryCountries extends \Magento\Framework\Model\AbstractModel
{

    protected $searchCriteria;
    protected $countries;
    protected $filter;
    protected $filterGroup;
    protected $categoryCountriesRepository;
    protected $searchResultsInterface;

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
        ResourceConnection $resourceConnection,
        array $data = []
    )
    {
        $this->resourceConnection = $resourceConnection;
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

    /**
     * @param CategoryInterface $category
     * @return CategoryCountries[]
     */
    public function getCategoryCountries(CategoryInterface $category)
    {
        if (null === $this->countries) {

            $filterProduct = $this->filter
                ->setField("category_id")
                ->setValue((int)$category->getId())
                ->setConditionType("eq");

            $this->filterGroup->setFilters([$filterProduct]);
            $this->searchCriteria->setFilterGroups([$this->filterGroup]);
            $this->countries = $this->categoryCountriesRepository->getList($this->searchCriteria);
        }

        return $this->countries;
    }

//    public function getCategoryCountries(Interceptor $category)
//   {
//       $connection = $this->resourceConnection->getConnection();
//
//       $select = $connection->select();
//       $select->from('category_countries', ['country_id']);
//       $select->where('category_id = ?', (int)$category->getId());
//
//       $result = $connection->fetchAll($select);
//
//       return $result;
//   }
}