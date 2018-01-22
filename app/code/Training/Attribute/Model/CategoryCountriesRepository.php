<?php
namespace Training\Attribute\Model;



use Training\Attribute\Model\ResourceModel\CategoryCountries as Resource;
use Training\Attribute\Model\ResourceModel\CategoryCountries\Collection;
use Training\Attribute\Api\Data\CategoryCountriesRepositoryInterface;
use Magento\Framework\DB\QueryBuilderFactory;

/**
 * Class StockRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CategoryCountriesRepository implements CategoryCountriesRepositoryInterface
{
    protected $resource;
    protected $categoryCountriesFactory;
    protected $queryBuilderFactory;
    protected $collectionFactory;

    /**
     * @param Resource $resource
     * @param CategoryCountriesFactory $categoryCountriesFactory
     * @param CollectionFactory $collectionFactory
     * @param QueryBuilderFactory $queryBuilderFactory
     */
    public function __construct(
        Resource $resource,
        CategoryCountriesFactory $categoryCountriesFactory,
        CollectionFactory $collectionFactory,
        QueryBuilderFactory $queryBuilderFactory
    ) {
        $this->resource = $resource;
        $this->categoryCountriesFactory = $categoryCountriesFactory;
        $this->collectionFactory = $collectionFactory;
        $this->queryBuilderFactory = $queryBuilderFactory;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $queryBuilder = $this->queryBuilderFactory->create();
        $queryBuilder->setCriteria($criteria);
        $queryBuilder->setResource($this->resource);
        $query = $queryBuilder->create();
        $collection = $this->collectionFactory->create(['query' => $query]);
        return $collection;
    }
}
