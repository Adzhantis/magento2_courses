<?php

namespace Training\LoginProtectedPage\Plugin\Controller;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Customer\Model\Session as CustomerSesion;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface as MessageManager;

class RedirectToLogin
{
    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    /**
     * @var CustomerSesion
     */
    private $customerSesion;

    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    /**
     * @var MessageManager
     */
    private $messageManager;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param array $allowedEntityTypes
     */
    public function __construct(
        PageRepositoryInterface $pageRepository,
        CustomerSesion $customerSesion,
        RedirectFactory $redirectFactory,
        MessageManager $messageManager
    ) {
        $this->pageRepository = $pageRepository;
        $this->customerSesion = $customerSesion;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * @param \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend $subject
     * @param \Closure $proceed
     * @param \Magento\Framework\DataObject $entity
     * @return bool
     */
    public function aroundExecute(
        \Magento\Cms\Controller\Page\View $subject,
        \Closure $proceed
    ) {
        $pageId = $subject->getRequest()->getParam('page_id', $subject->getRequest()->getParam('id', false));
        $page = $this->pageRepository->getById($pageId); // <-- need store id to be specified
        $requireLogin = $page->getIsLoginProtected();

        if (!$this->customerSesion->isLoggedIn() && $requireLogin) {
            $this->messageManager->addError(__('You must be logged in to see that page.'));
            return $this->redirectFactory->create()->setPath('customer/account/login');
        }
        return $proceed();
    }
}
