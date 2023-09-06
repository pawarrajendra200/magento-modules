<?php
/**
 * @author  Rajendra pawar
 */
namespace TechRaj\OrderPublisherQueue\Model\Order;

use Psr\Log\LoggerInterface;



/**
 * Class Consumer
 * @package TechRaj\OrderPublisherQueue\Model\Order
 */
class Consumer
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * Consumer constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $message
     */
    public function processMessage($message)
    {
        $this->logger->info($message);
    }
}
