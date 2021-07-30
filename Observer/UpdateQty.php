<?php declare(strict_types=1);

namespace AHT\Training\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;

class UpdateQty  implements ObserverInterface
{
    public function execute(EventObserver $observer)
    {
        $order = $observer->getOrder();
        $order->setTotalQtyOrdered(3);
        return $this;
    }
}
