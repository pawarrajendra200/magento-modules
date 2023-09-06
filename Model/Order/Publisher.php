<?php
/**
 * @author  Rajendra pawar
 */
namespace TechRaj\OrderPublisherQueue\Model\Order;

use Magento\Framework\MessageQueue\PublisherInterface;
class Publisher
{
    public const TOPIC_NAME = 'rajtech_order_queue';

    /**
     * @var PublisherInterface
     */
    private $publisher;

    /**
     * Publisher constructor.
     * @param PublisherInterface $publisher
     */
    public function __construct(
        PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }
    /**
     * @param string $message
     */
    public function execute($message)
    {
        $this->publisher->publish(self::TOPIC_NAME, $message);
    }
}
