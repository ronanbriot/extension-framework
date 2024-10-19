<?php

namespace Webkul\UVDesk\ExtensionFrameworkBundle\Definition\Application;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Webkul\UVDesk\ExtensionFrameworkBundle\Definition\Package\PackageInterface;

abstract class Application implements ApplicationInterface, EventSubscriberInterface
{
    protected $package;

    public static abstract function getMetadata(): ApplicationMetadata;

    /**
     *
     * @return array<string, string|array{0: string, 1: int}|list<array{0: string, 1?: int}>>
     */
    public static abstract function getSubscribedEvents(): array;

    final public function setPackage(PackageInterface $package): ApplicationInterface
	{
        if (empty($this->package)) {
            $this->package = $package;
        }

        return $this;
    }
    
    final public function getPackage() : PackageInterface
    {
        return $this->package;
    }
}
