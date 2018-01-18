<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Repository\Api;

/**
 * Customer CRUD interface.
 * @api
 * @since 100.0.2
 */
interface ExampleRepositoryInterface
{
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
