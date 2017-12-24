<?php

namespace Training\Test3\Controller\Product;

class View extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
     //  echo "ONE"; exit;
    }

    public function beforeExecute()
    {
       // echo "BEFORE<BR>"; exit;
    }

    public function afterExecute(
        \Magento\Catalog\Controller\Product\View $controller, $result)
    {//echo '<pre>'; var_dump(get_class($result));die;
        // echo "AFTER"; exit;
        return $result;
    }

}
