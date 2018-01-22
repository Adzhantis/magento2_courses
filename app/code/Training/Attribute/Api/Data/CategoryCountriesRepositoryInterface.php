<?php

namespace Training\Attribute\Api\Data;

/**
 * Created by PhpStorm.
 * User: Марфуша
 * Date: 19.01.2018
 * Time: 20:11
 */
interface CategoryCountriesRepositoryInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria);
}