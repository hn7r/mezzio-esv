<?php

namespace Hn7r\Mezzio\Esv\Factory;

use Hn7r\Esv\Client\EsvClient;
use Hn7r\Esv\Client\EsvClientInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class EsvClientFactory
{
    public function __invoke(ContainerInterface $container): EsvClientInterface
    {
        $config = $container->get('config');
        $apiKey = $config['esv']['api_key'] ?? null;
        assert(is_string($apiKey));

        $client = $container->get(ClientInterface::class);
        assert($client instanceof ClientInterface);

        $requestFactory = $container->get(RequestFactoryInterface::class);
        assert($requestFactory instanceof RequestFactoryInterface);

        return new EsvClient(
            $client,
            $requestFactory,
            $apiKey,
        );
    }
}