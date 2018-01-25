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
class Index extends \Magento\Framework\App\Action\Action
{

    protected $pageFactory;
    protected $_storeCollection;
    protected $categoryRepositoryInterfaceFactory;

    /**
     * @var \Magento\Store\Model\Store
     */
    protected $_store;

    /**
     * Onepage constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection
     * @param \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection
     * @param Store $store
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Store\Model\ResourceModel\Store\Collection $storeCollection,
        \Magento\Catalog\Api\CategoryRepositoryInterfaceFactory $categoryRepositoryInterfaceFactory,
        \Magento\Store\Model\Store $store
    ) {
        $this->pageFactory = $pageFactory;
        $this->_storeCollection = $storeCollection;
        $this->categoryRepositoryInterfaceFactory = $categoryRepositoryInterfaceFactory;
        $this->_store = $store;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $categoryRepository = $this->categoryRepositoryInterfaceFactory->create();

        $category = $categoryRepository->get(4);

        foreach ($category->getExtensionAttributes()->getCategoryCountries() as $categoryCountry){
            echo '<pre>'; var_dump($categoryCountry->getCountryId());
        }

        die;

        return $this->pageFactory->create();
    }
}
