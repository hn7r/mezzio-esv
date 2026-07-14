<?php

namespace Hn7r\Mezzio\Esv;

use Hn7r\Esv\Client\EsvClientInterface;
use Hn7r\Mezzio\Esv\Factory\EsvClientFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    EsvClientInterface::class => EsvClientFactory::class,
                ],
            ],
        ];
    }
}