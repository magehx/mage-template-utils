<?php

declare(strict_types=1);

namespace MageHx\MageTemplateUtils\Model;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\ObjectManagerInterface;
use RuntimeException;

class ViewModelProvider
{
    public function __construct(
        private readonly ObjectManagerInterface $objectManager
    ) {
    }

    /**
     * Returns view model instance.
     *
     * @template T of ArgumentInterface
     * @param class-string<T> $viewModelName
     * @return T
     * @throws RuntimeException
     */
    public function get(string $viewModelName): ArgumentInterface
    {
        $viewModel = $this->objectManager->get($viewModelName);

        if (!$viewModel instanceof ArgumentInterface) {
            throw new RuntimeException("{$viewModelName} is not an instance of ArgumentInterface");
        }

        return $viewModel;
    }
}
