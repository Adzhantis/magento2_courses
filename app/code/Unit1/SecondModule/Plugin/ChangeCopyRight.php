<?php
namespace Unit1\SecondModule\Plugin;

class ChangeCopyRight  
{
    public function afterGetCopyright()
    {
        return __('Custom Copyright');
    }
}
