<?php

declare(strict_types=1);

namespace MageHx\MageTemplateUtils\Model;

use Magento\Framework\Escaper;

class ClassNames
{
    public function __construct(
        private readonly Escaper $escaper,
    ) {
    }

    /**
     * Mimics Laravel's @class directive.
     *
     * @param array<int|string, bool|string> $classes
     */
    public function build(array $classes): string
    {
        $result = [];

        foreach ($classes as $key => $value) {
            if (is_int($key)) {
                $result[] = $value;
            } elseif ($value) {
                $result[] = $key;
            }
        }

        return $this->escaper->escapeHtmlAttr(implode(' ', $result));
    }
}
