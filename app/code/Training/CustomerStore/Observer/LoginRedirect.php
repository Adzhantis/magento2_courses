<?php

namespace Training\CustomerStore\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Store\Api\StoreRepositoryInterface;
use Magento\Store\Api\StoreCookieManagerInterface;

/**
 * Customer Observer Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class LoginRedirect implements ObserverInterface
{
    /**
     * @var StoreRepositoryInterface
     */
    protected $storeRepository;

    /**
     * @var StoreCookieManagerInterface
     */
    protected $storeCookieManager;

    /**
     * @param StoreRepositoryInterface $storeRepository
     * @param StoreCookieManagerInterface $storeCookieManager
     */
    public function __construct(
        StoreRepositoryInterface $storeRepository,
        StoreCookieManagerInterface $storeCookieManager
    ) {
        $this->storeRepository = $storeRepository;
        $this->storeCookieManager = $storeCookieManager;
    }

    /**
     * Address after save event handler
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customerDataModel = $observer->getCustomer();
        $prefLangAttribute = $customerDataModel->getCustomAttribute('pref_lang');
        if (!$prefLangAttribute) {
            return;
        }

        $prefStoreId = $prefLangAttribute->getValue();
        try {
            $prefStore = $this->storeRepository->getActiveStoreById($prefStoreId);
            $this->storeCookieManager->setStoreCookie($prefStore);
        } catch (\Exception $e) {
        }
    }
}
