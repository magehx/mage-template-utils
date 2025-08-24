<?php

declare(strict_types=1);

namespace MageHx\MageTemplateUtils\Model;

use Magento\Framework\Escaper;

class Esc
{
    public function __construct(
        private readonly Escaper $escaper,
    ) {
    }

    public function html($data, $allowedTags = null): array|string
    {
        return $this->escaper->escapeHtml($data, $allowedTags);
    }

    public function htmlAttr($string, $escapeSingleQuote = true): string
    {
        return $this->escaper->escapeHtmlAttr($string, $escapeSingleQuote);
    }

    public function js($string): string
    {
        return $this->escaper->escapeJs($string);
    }

    public function url($string): string
    {
        return $this->escaper->escapeUrl($string);
    }
}
