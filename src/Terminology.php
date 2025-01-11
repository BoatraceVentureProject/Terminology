<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use DI\Container;
use DI\ContainerBuilder;
use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class Terminology
{
    /**
     * @var \Boatrace\Venture\Project\Terminology
     */
    protected static Terminology $instance;

    /**
     * @var \DI\Container
     */
    protected static Container $container;

    /**
     * @param  \Boatrace\Venture\Project\MainTerminology  $terminology
     * @return void
     */
    public function __construct(protected MainTerminology $terminology){}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public function __call(string $name, array $arguments): ?Collection
    {
        return $this->terminology->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public static function __callStatic(string $name, array $arguments): ?Collection
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @return \Boatrace\Venture\Project\Terminology
     */
    public static function getInstance(): Terminology
    {
        return self::$instance ?? self::$instance = (
            self::$container ?? self::$container = self::getContainer()
        )->get('Terminology');
    }

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container
    {
        $builder = new ContainerBuilder;
        $builder->addDefinitions(__DIR__ . '/../config/definitions.php');
        return $builder->build();
    }
}
