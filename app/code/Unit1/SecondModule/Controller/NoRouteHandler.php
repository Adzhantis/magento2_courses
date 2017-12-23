<?php

namespace Unit1\SecondModule\Controller;

use \Magento\Framework\App\Router\NoRouteHandlerInterface;
use \Magento\Framework\App\RequestInterface;

class NoRouteHandler implements NoRouteHandlerInterface {
    public function process(RequestInterface $request) {
        $moduleName = 'cms';
        $actionPath = 'index';
        $actionName = 'index';
        $request->setModuleName($moduleName)
            ->setControllerName($actionPath)
            ->setActionName($actionName);

        return true;
    }
}