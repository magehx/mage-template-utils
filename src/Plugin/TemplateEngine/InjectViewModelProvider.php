<?php

declare(strict_types=1);

namespace MageHx\MageTemplateUtils\Plugin\TemplateEngine;

use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\TemplateEngine\Php as TemplateEnginePhp;
use MageHx\MageTemplateUtils\Model\ViewModelProvider;

class InjectViewModelProvider
{
    public function __construct(
        private readonly ViewModelProvider $viewModelProvider,
    ) {
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeRender(
        TemplateEnginePhp $subject,
        BlockInterface $block,
        $fileName,
        array $dictionary = []
    ): array {
        // Add $viewModelProvider global variable to all templates
        if (!isset($dictionary['viewModelProvider'])) {
            $dictionary['viewModelProvider'] = $this->viewModelProvider;
        }

        return [$block, $fileName, $dictionary];
    }
}
