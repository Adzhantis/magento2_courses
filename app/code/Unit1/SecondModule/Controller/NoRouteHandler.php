<?php

namespace Unit1\SecondModule\Controller;

use \Magento\Framework\App\Router\NoRouteHandlerInterface;
use \Magento\Framework\App\RequestInterface;

class NoRouteHandler implements NoRouteHandlerInterface {
    public function process(RequestInterface $request) {
        $moduleName = 'cms';
        $actionPath = 'page';
        $actionName = 'view';
        $request->setModuleName($moduleName)
            ->setControllerName($actionPath)
            ->setActionName($actionName)
            ->setParams(['page_id' => 3]);


        return true;
    }
}