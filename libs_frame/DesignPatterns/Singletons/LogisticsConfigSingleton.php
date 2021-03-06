<?php
/**
 * Created by PhpStorm.
 * User: 姜伟
 * Date: 2019/6/18 0018
 * Time: 16:42
 */
namespace DesignPatterns\Singletons;

use SyLogistics\ConfigAliMart;
use SyLogistics\ConfigKd100;
use Tool\Tool;
use Traits\SingletonTrait;

class LogisticsConfigSingleton
{
    use SingletonTrait;
    /**
     * @var \SyLogistics\ConfigAliMart
     */
    private $aliMartConfig = null;
    /**
     * @var \SyLogistics\ConfigKd100
     */
    private $kd100Config = null;

    private function __construct()
    {
    }

    /**
     * @return \DesignPatterns\Singletons\LogisticsConfigSingleton
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return \SyLogistics\ConfigAliMart
     */
    public function getAliMartConfig()
    {
        if (is_null($this->aliMartConfig)) {
            $configs = Tool::getConfig('logistics.' . SY_ENV . SY_PROJECT);
            $protocol = (string)Tool::getArrayVal($configs, 'alimart.service.protocol', 'https', true);
            $domain = (string)Tool::getArrayVal($configs, 'alimart.service.domain', '', true);
            $aliMartConfig = new ConfigAliMart();
            $aliMartConfig->setAppKey((string)Tool::getArrayVal($configs, 'alimart.app.key', '', true));
            $aliMartConfig->setAppSecret((string)Tool::getArrayVal($configs, 'alimart.app.secret', '', true));
            $aliMartConfig->setAppCode((string)Tool::getArrayVal($configs, 'alimart.app.code', '', true));
            $aliMartConfig->setServiceAddress($protocol, $domain);
            $this->aliMartConfig = $aliMartConfig;
        }

        return $this->aliMartConfig;
    }

    /**
     * @return \SyLogistics\ConfigKd100
     */
    public function getKd100Config()
    {
        if (is_null($this->kd100Config)) {
            $configs = Tool::getConfig('logistics.' . SY_ENV . SY_PROJECT);
            $kd100Config = new ConfigKd100();
            $kd100Config->setAppId((string)Tool::getArrayVal($configs, 'kd100.app.id', '', true));
            $kd100Config->setAppKey((string)Tool::getArrayVal($configs, 'kd100.app.key', '', true));
            $this->kd100Config = $kd100Config;
        }

        return $this->kd100Config;
    }
}
