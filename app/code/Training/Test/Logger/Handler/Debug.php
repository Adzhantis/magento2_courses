<?php
namespace Training\Test\Logger\Handler;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Debug as Base;

class Debug extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/log_path.log';
}
