<?php
namespace Unit1\SecondModule\Plugin;

class addSyffix
{
    public function afterAddCrumb($subject, $result, $params)
    {
        foreach ($subject->_crumbs as $key => $value ) {
            if (!isset($crumbInfo[$key])) {
                $crumbInfo[$key] = null;
            }else{
                $subject->_crumbs[$key] = $value . ' (!) ';
            }
        }

        return $subject;
    }

}
