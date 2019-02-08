<?php
declare(strict_types=1);

namespace Divante\CartSync\Observer;

use Divante\CartSync\Model\Config;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class SuccessObserver
 *
 * @package Divante\CartSync\Observer
 */
class SuccessObserver implements ObserverInterface
{
    /**
     * @var Config
     */
    protected $config;

    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $url = $this->config->getVueStorefrontSuccessUrl();

        if ($url && $url !== '') {
            if (!(strpos($url, "http://") !== false || strpos($url, "https://") !== false)) {
                $url = 'https://' . $url;
            }
            header("Location: " . $url);
            die();
        }
    }
}
