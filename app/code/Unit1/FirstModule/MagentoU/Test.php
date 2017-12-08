<?php
namespace Unit1\FirstModule\MagentoU;
/**
 * Created by PhpStorm.
 * User: Ally
 * Date: 07.12.2017
 * Time: 22:48
 */
class Test
{
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Checkout\Model\Session $session,
        \Unit1\FirstModule\Api\ProductRepositoryInterface $unit1ProductRepository,
        $justAParameter = false,
        array $data
    ) {
    }
}
