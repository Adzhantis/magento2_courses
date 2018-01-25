<?php

namespace Training\Attribute\Api\Data;

interface CategoryCountriesRepositoryInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria);
}