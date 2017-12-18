<?php
namespace Unit1\SecondModule\Plugin;

use Magento\Framework\Phrase;

class BeforeAddCrumb
{
    public function __construct()
    {

    }


    public function beforeAddCrumb($subject, $crumbName, $crumbInfo)
    {

        if(is_string($crumbInfo['label']) || (!empty($crumbInfo['title']) && is_string($crumbInfo['title']))){

            $crumbInfo = [
                'label' => $crumbInfo['label'] . ' (str)', $crumbInfo['label'],
                'title' => $crumbInfo['title'] . ' (str)', $crumbInfo['title'],
                'link' => isset($crumbInfo['link']) ?: '',
            ];

            return [
                'crumbName' => $crumbName,
                'crumbInfo' => $crumbInfo
            ];
        }

        $crumbInfo = [
            'label' => new Phrase($crumbInfo['label']->getText() . ' (obj)', $crumbInfo['label']->getArguments()),
            'title' => !empty($crumbInfo['title']) ?
                new Phrase($crumbInfo['title']->getText() . ' (obj)', $crumbInfo['title']->getArguments())
                : '',
            'link' => isset($crumbInfo['link']) ?: '',
        ];


        return [
            'crumbName' => $crumbName,
            'crumbInfo' => $crumbInfo
        ];
    }

}
