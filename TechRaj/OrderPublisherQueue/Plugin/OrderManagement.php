<?php
/**
 * @author  Rajendra pawar
 */

namespace TechRaj\OrderPublisherQueue\Plugin;

use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderManagementInterface;
use TechRaj\OrderPublisherQueue\Model\Order\Publisher;


/**
 * Class OrderManagement
 */
class OrderManagement
{
    /**
     * @var JsonHelper
     */
    private $jsonHelper;

    /**
     * @var Publisher
     */
    private $orderPublisher;
    /**
     * OrderManagement constructor.
     * @param JsonHelper $jsonHelper
     * @param Publisher $orderPublisher
     */
    public function __construct(
        JsonHelper $jsonHelper,
        Publisher $orderPublisher
    )
    {
        $this->jsonHelper = $jsonHelper;
        $this->orderPublisher = $orderPublisher;
    }

    /**
     * @param OrderManagementInterface $subject
     * @param OrderInterface $order
     * @return OrderInterface
     */
    public function afterPlace(
        OrderManagementInterface $subject,
        OrderInterface $result
    ) {
        $orderId = $result->getIncrementId();
        if ($orderId) {
            $publishData = [
                'order id' => $orderId,
                'customer Name' => $result->getCustomerFirstname().' '. $result->getCustomerLastname(),
                'email' => $result->getCustomerEmail(),
                'Order total' => $result->getGrandTotal(),
                ];
            $this->orderPublisher->execute($this->jsonHelper->jsonEncode($publishData));
        }
        return $result;
    }
}
