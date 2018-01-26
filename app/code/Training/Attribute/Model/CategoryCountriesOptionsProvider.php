<?php

namespace Training\Attribute\Model;

class CategoryCountriesOptionsProvider implements \Magento\Framework\Data\OptionSourceInterface
{

    private $model;

    public function __construct(CategoryCountries $model)
    {
        $this->model = $model;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->model->getCountriesForForm();
    }
}
