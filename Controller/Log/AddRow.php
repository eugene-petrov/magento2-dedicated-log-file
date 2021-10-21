<?php

declare(strict_types=1);

namespace Snippet\DedicatedLogFile\Controller\Log;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\ManagerInterface;
use Psr\Log\LoggerInterface;

class AddRow implements ActionInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ManagerInterface
     */
    private $messageManager;

    /**
     * @var ResultFactory
     */
    private $resultFactory;

    /**
     * @var Validator
     */
    private $validator;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param Context $context
     * @param Validator $validator
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        Validator $validator,
        LoggerInterface $logger
    ) {
        $this->request = $context->getRequest();
        $this->resultFactory = $context->getResultFactory();
        $this->messageManager = $context->getMessageManager();
        $this->validator = $validator;
        $this->logger = $logger;
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        try {
            if (!$this->validator->validate($this->request)) {
                throw new LocalizedException(__('Invalid form key. Please, reload the page and try again.'));
            }

            $text = $this->request->getParam('text');
            $this->logger->debug(__('logging text value: %1', $text));

            $this->messageManager->addSuccessMessage(__('You successfully logged: %1', $text));
            $this->messageManager->addSuccessMessage(__('Go to var/log/snippet.log to see you text'));

            return $result->setData([
                'success' => true,
            ]);
        } catch (LocalizedException $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            $this->messageManager->addErrorMessage($e->getMessage());
            return $result->setData(['error' => true]);
        }
    }
}
