<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Repository\Controller\Example;

/**
 * Index controller
 *
 */
class Repository extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;


    protected $exampleRepository;
    protected $searchCriteria;

    /**
     * Repository constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Training\Repository\Api\ExampleRepositoryInterface $exampleRepository
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Training\Repository\Api\ExampleRepositoryInterface $exampleRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    ) {
        $this->pageFactory = $pageFactory;
        $this->exampleRepository = $exampleRepository;
        $this->searchCriteria = $searchCriteria;

        parent::__construct($context);
    }

    public function execute() {

        $examples = $this->exampleRepository->getList($this->searchCriteria);

        foreach ($examples->getItems() as $customer) {
            var_dump($customer->getExampleId());
        }die;

    }
}
