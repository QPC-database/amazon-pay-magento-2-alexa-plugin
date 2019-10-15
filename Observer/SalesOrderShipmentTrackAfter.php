<?php
/**
 * Copyright © Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Amazon\Alexa\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SalesOrderShipmentTrackAfter implements ObserverInterface
{
    /**
     * @var \Amazon\Alexa\Model\AlexaConfig
     */
    private $alexaConfig;

    /**
     * @var \Amazon\Core\Helper\Data
     */
    private $coreHelper;

    /**
     * @var \Amazon\Alexa\Model\Alexa
     */
    private $alexaModel;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    private $messageManager;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var \Amazon\Core\Logger\AlexaLogger
     */
    private $alexaLogger;

    /**
     * SalesOrderShipmentTrackAfter constructor.
     * @param \Amazon\Alexa\Model\AlexaConfig $alexaConfig
     * @param \Amazon\Core\Helper\Data
     * @param \Amazon\Alexa\Model\Alexa $alexaModel
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Amazon\Alexa\Logger\AlexaLogger $alexaLogger
     */
    public function __construct(
        \Amazon\Alexa\Model\AlexaConfig $alexaConfig,
        \Amazon\Core\Helper\Data $coreHelper,
        \Amazon\Alexa\Model\Alexa $alexaModel,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Psr\Log\LoggerInterface $logger,
        \Amazon\Alexa\Logger\AlexaLogger $alexaLogger
    ) {
        $this->alexaConfig  = $alexaConfig;
        $this->coreHelper   = $coreHelper;
        $this->alexaModel   = $alexaModel;
        $this->messageManager = $messageManager;
        $this->logger           = $logger;
        $this->alexaLogger      = $alexaLogger;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(Observer $observer)
    {
        try {
            if (!$this->coreHelper->isPwaEnabled() || !$this->alexaConfig->isAlexaEnabled()) {
                return;
            }

            /** @var \Magento\Sales\Model\Order\Shipment\Track $track */
            $track = $observer->getEvent()->getTrack();

            if ($track->getShipment()->getOrder()->getPayment()->getMethod() == 'amazon_payment') {
                $this->alexaModel->addDeliveryNotification($track);
            }
        } catch (\Exception $e) {
            $this->logger->error($e);
            $this->alexaLogger->error($e->getMessage());
            $this->messageManager->addWarningMessage(
                __('Failed to submit tracking information to Amazon Alexa.')
            );
        }
    }
}
