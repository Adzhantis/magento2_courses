<?php
namespace Training\Attribute\Model;



use Training\Attribute\Model\ResourceModel\CategoryCountries as Resource;
use Training\Attribute\Api\Data\CategoryCountriesRepositoryInterface;
use Magento\Framework\DB\QueryBuilderFactory;
use Magento\Framework\Api\SearchResultsInterfaceFactory;

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
    protected $collectionProcessor;
    protected $searchResultsInterfaceFactory;

    /**
     * CategoryCountriesRepository constructor.
     * @param Resource $resource
     * @param Resource\CollectionFactory $collectionFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterfaceFactory $searchResultsInterfaceFactory
     */
    public function __construct(
        Resource $resource,
        \Training\Attribute\Model\ResourceModel\CategoryCountries\CollectionFactory $collectionFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResultsInterfaceFactory
    ) {
        $this->resource = $resource;
        $this->searchResultsInterfaceFactory = $searchResultsInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $collectionFactory;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \Magento\Cms\Model\ResourceModel\Page\Collection $collection */
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

       /*

        $searchResults = $this->searchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

       */

        return $collection->getItems();
    }

    public function save(\Training\Attribute\Model\CategoryCountries $categoryCountries)
    {

        try {
            $this->resource->save($categoryCountries);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $categoryCountries;
    }

    public function delete(\Training\Attribute\Model\CategoryCountries $categoryCountries)
    {
        try {
            $this->resource->delete($categoryCountries);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }
}
