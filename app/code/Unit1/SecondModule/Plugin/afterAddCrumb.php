<?php
namespace Unit1\SecondModule\Plugin;

class afterAddCrumb
{
    public function afterAddCrumb($subject, $result, $crumbName, $crumbInfo)
    {

        var_dump($crumbName, $crumbInfo['label']);die;//$result->_crumbs
        //var_dump($result->toHtml(), $params);
        //die;
        //var_dump(13);die;
        /*$result->addCrumb(
            'home2',
            [
                'label' => __('Home (!)'),

                'title' => __('Go to Home Page'),
                'link' => 'url'
            ]
        );*/
    }

}
