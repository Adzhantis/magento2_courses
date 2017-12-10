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
        //\Unit1\FirstModule\Api\ProductInterface $unit1ProductRepository,
        $justAParameter = false,
        array $data
    ) {
        echo '<pre>';
        var_dump($data);die;
    }

}
