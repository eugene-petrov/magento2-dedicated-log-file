<?php

declare(strict_types=1);

namespace Snippet\DedicatedLogFile\Controller\Log;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @param PageFactory $pageFactory
     */
    public function __construct(
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
    }

    /**
     * @inheridoc
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}
