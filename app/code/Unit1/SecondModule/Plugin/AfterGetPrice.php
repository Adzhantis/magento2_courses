<?php
namespace Unit1\SecondModule\Plugin;


class AfterGetPrice
{
    public function afterGetPrice($subject, $result)
    {
        return $result + 1;
    }

}
