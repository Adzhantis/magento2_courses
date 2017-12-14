<?php
namespace Unit1\SecondModule\Plugin;


class afterGetPrice
{
    public function afterGetPrice($subject, $result)
    {
        return $result + 1;
    }

}
