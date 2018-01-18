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
class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;


    protected $exampleCollection;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Training\Repository\Model\ResourceModel\Example\Collection $exampleCollection
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Training\Repository\Model\ResourceModel\Example\Collection $exampleCollection
    ) {
        $this->pageFactory = $pageFactory;
        $this->exampleCollection = $exampleCollection;

        parent::__construct($context);
    }

    public function execute() {
        foreach ($this->exampleCollection as $example){
            var_dump($example->getExampleId(), $example->getExampleName());
        }die;
    }
}
