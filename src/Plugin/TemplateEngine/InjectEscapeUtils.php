<?php

declare(strict_types=1);

namespace MageHx\MageTemplateUtils\Plugin\TemplateEngine;

use Magento\Framework\Escaper;
use Magento\Framework\Phrase;
use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\TemplateEngine\Php as TemplateEnginePhp;

class InjectEscapeUtils
{
    public function __construct(private readonly Escaper $escaper)
    {
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
        // Add $eHtml global variable to all templates
        if (!isset($dictionary['eHtml'])) {
            $dictionary['eHtml'] = fn($value) => $this->escaper->escapeHtml($value);
        }
        // Add $eUrl global variable to all templates
        if (!isset($dictionary['eUrl'])) {
            $dictionary['eUrl'] = fn($value) => $this->escaper->escapeUrl($value);
        }
        // Add $eJs global variable to all templates
        if (!isset($dictionary['eJs'])) {
            $dictionary['eJs'] = fn($value) => $this->escaper->escapeJs($value);
        }
        // Add $eHtmlAttr global variable to all templates
        if (!isset($dictionary['eHtmlAttr'])) {
            $dictionary['eHtmlAttr'] = fn($value) => $this->escaper->escapeHtmlAttr($value);
        }

        return [$block, $fileName, $dictionary];
    }
}
