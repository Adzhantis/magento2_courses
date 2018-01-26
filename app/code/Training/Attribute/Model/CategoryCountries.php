<?php

namespace Training\Attribute\Model;

use Magento\Catalog\Api\Data\CategoryInterface;
use \Magento\Catalog\Model\Category\Interceptor;
use \Training\Attribute\Model\ResourceModel\CategoryCountries\CollectionFactory;
use Magento\Framework\Api\SearchResultsInterface;

class CategoryCountries extends \Magento\Framework\Model\AbstractModel
{

    protected $searchCriteria;
    protected $countries;
    protected $filter;
    protected $filterGroup;
    protected $categoryCountriesRepository;
    protected $searchResultsInterface;
    protected $collectionFactory;

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
        CollectionFactory $collectionFactory,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
        \Magento\Framework\Registry $registry,
        ResourceModel\CategoryCountries $resource,
        ResourceModel\CategoryCountries\Collection $resourceCollection,
        array $data = []
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->searchCriteria = $searchCriteria;
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
            $col = $this->collectionFactory->create();
            $col->addCategoryIdFilter((int)$category->getId());
            $this->countries = $col->getItems();
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

    public function getCountriesForForm($empty = false, $all = false)
    {
        $options = [];
        //if ($empty) {
            $options[] = ['label' => __('-- Please Select --'), 'value' => ''];
       // }

        return $options;
    }
}