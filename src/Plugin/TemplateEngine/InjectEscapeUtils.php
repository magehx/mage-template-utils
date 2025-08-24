<?php

declare(strict_types=1);

namespace MageHx\MageTemplateUtils\Plugin\TemplateEngine;

use MageHx\MageTemplateUtils\Model\Esc;
use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\TemplateEngine\Php as TemplateEnginePhp;

class InjectEscapeUtils
{
    public function __construct(
        private readonly Esc $esc,
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
        if (!isset($dictionary['esc'])) {
            $dictionary['esc'] = $this->esc;
        }

        return [$block, $fileName, $dictionary];
    }
}
