<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Repository\Controller\Index;

use \Magento\Store\Model\Store;
/**
 * Index controller
 *
 */
class Customer extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;


    protected $customerRepository;
    protected $searchCriteria;
    protected $sortOrder;
    protected $filter;
    protected $filterGroup;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @param \Magento\Framework\Api\SortOrder $sortOrder
     * @param \Magento\Framework\Api\Filter $filter
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
         \Magento\Framework\Api\SortOrder $sortOrder,
        \Magento\Framework\Api\Filter $filter,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup
    ) {
        $this->pageFactory = $pageFactory;
        $this->customerRepository = $customerRepository;
        $this->searchCriteria = $searchCriteria;
        $this->sortOrder = $sortOrder;
        $this->filter = $filter;
        $this->filterGroup = $filterGroup;
        parent::__construct($context);
    }

    public function execute() {

        $filterFirstname = $this->filter
            ->setField("first_name")
            ->setValue("%g%")
            ->setConditionType("like");

        $filterEmail = $this->filter
            ->setField("email")
            ->setValue("%s%")
            ->setConditionType("like");

        $this->filterGroup->setFilters([$filterFirstname, $filterEmail]);

        $this->sortOrder
            ->setField("email")
            ->setDirection("ASC");

        $this->searchCriteria
            ->setFilterGroups([$this->filterGroup])
            ->setSortOrders([$this->sortOrder]);

        $this->searchCriteria->setPageSize(6); //retrieve 6 or less entities

        $customers = $this->customerRepository->getList($this->searchCriteria);

        foreach ($customers->getItems() as $customer) {
            $this->outputCustomer($customer);
        }

        return $this->pageFactory->create();
    }

    private function outputCustomer(
        \Magento\Customer\Api\Data\CustomerInterface $customer
    ) {
        $this->getResponse()->appendBody(sprintf(
            "\"%s %s\" <%s> (%s)\n",
            $customer->getFirstname(),
            $customer->getLastname(),
            $customer->getEmail(),
            $customer->getId()
        ));
    }
}
