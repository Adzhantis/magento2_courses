<?php
namespace Unit1\SecondModule\Plugin;

use Magento\Framework\Phrase;

class beforeAddCrumb
{
    public function beforeAddCrumb($subject, $crumbName, $crumbInfo)
    {
        $crumbInfo = [
            'label' => new Phrase($crumbInfo['label']->getText() . ' (!)', $crumbInfo['label']->getArguments()),
            'title' => new Phrase($crumbInfo['title']->getText() . ' (!)', $crumbInfo['title']->getArguments()),
            'link' => isset($crumbInfo['link']) ?: '',
        ];


        return [
            'crumbName' => $crumbName,
            'crumbInfo' => $crumbInfo
        ];
    }

}
