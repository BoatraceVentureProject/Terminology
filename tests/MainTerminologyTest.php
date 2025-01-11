<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\MainTerminology;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class MainTerminologyTest extends PHPUnitTestCase
{
    /**
     * @var \Boatrace\Venture\Project\MainTerminology
     */
    protected MainTerminology $terminology;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected Collection $collection;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->terminology ??= new MainTerminology;

        $this->collection ??= collect();
        foreach (glob(__DIR__ . '/../config/terminologies/*.php') as $fileName) {
            if (! $this->collection->has($fileBaseName = basename($fileName, '.php'))) {
                $this->collection->put($fileBaseName, collect(require $fileName));
            }
        }
    }

    /**
     * @return void
     */
    public function testNull(): void
    {
        $this->assertNull($this->terminology->null());
    }

    /**
     * @return void
     */
    public function testClassById(): void
    {
        foreach ($this->collection->get('class')->pluck('id') as $index => $terminologyId) {
            $this->assertTrue($this->terminology->classById($terminologyId)->diff(
                $this->collection->get('class')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testClassByName(): void
    {
        foreach ($this->collection->get('class')->pluck('name') as $index => $terminologyName) {
            $this->assertTrue($this->terminology->classByName($terminologyName)->diff(
                $this->collection->get('class')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testClassByShortName(): void
    {
        foreach ($this->collection->get('class')->pluck('short_name') as $index => $terminologyShortName) {
            $this->assertTrue($this->terminology->classByShortName($terminologyShortName)->diff(
                $this->collection->get('class')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testDirectionById(): void
    {
        foreach ($this->collection->get('direction')->pluck('id') as $index => $terminologyId) {
            $this->assertTrue($this->terminology->directionById($terminologyId)->diff(
                $this->collection->get('direction')->get($index)
            )->isEmpty());
        }
    }


    /**
     * @return void
     */
    public function testDirectionByName(): void
    {
        foreach ($this->collection->get('direction')->pluck('name') as $index => $terminologyName) {
            $this->assertTrue($this->terminology->directionByName($terminologyName)->diff(
                $this->collection->get('direction')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testPlaceById(): void
    {
        foreach ($this->collection->get('place')->pluck('id') as $index => $terminologyId) {
            $this->assertTrue($this->terminology->placeById($terminologyId)->diff(
                $this->collection->get('place')->get($index)
            )->isEmpty());
        }
    }


    /**
     * @return void
     */
    public function testPlaceByName(): void
    {
        foreach ($this->collection->get('place')->pluck('name') as $index => $terminologyName) {
            $this->assertTrue($this->terminology->placeByName($terminologyName)->diff(
                $this->collection->get('place')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testPlaceByShortName(): void
    {
        foreach ($this->collection->get('place')->pluck('short_name') as $index => $terminologyShortName) {
            $this->assertTrue($this->terminology->placeByShortName($terminologyShortName)->diff(
                $this->collection->get('place')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testTechniqueById(): void
    {
        foreach ($this->collection->get('technique')->pluck('id') as $index => $terminologyId) {
            $this->assertTrue($this->terminology->techniqueById($terminologyId)->diff(
                $this->collection->get('technique')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testTechniqueByName(): void
    {
        foreach ($this->collection->get('technique')->pluck('name') as $index => $terminologyName) {
            $this->assertTrue($this->terminology->techniqueByName($terminologyName)->diff(
                $this->collection->get('technique')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testTechniqueByShortName(): void
    {
        foreach ($this->collection->get('technique')->pluck('short_name') as $index => $terminologyShortName) {
            $this->assertTrue($this->terminology->techniqueByShortName($terminologyShortName)->diff(
                $this->collection->get('technique')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testWeatherById(): void
    {
        foreach ($this->collection->get('weather')->pluck('id') as $index => $terminologyId) {
            $this->assertTrue($this->terminology->weatherById($terminologyId)->diff(
                $this->collection->get('weather')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testWeatherByName(): void
    {
        foreach ($this->collection->get('weather')->pluck('name') as $index => $terminologyName) {
            $this->assertTrue($this->terminology->weatherByName($terminologyName)->diff(
                $this->collection->get('weather')->get($index)
            )->isEmpty());
        }
    }

    /**
     * @return void
     */
    public function testWeatherByShortName(): void
    {
        foreach ($this->collection->get('weather')->pluck('short_name') as $index => $terminologyShortName) {
            $this->assertTrue($this->terminology->weatherByShortName($terminologyShortName)->diff(
                $this->collection->get('weather')->get($index)
            )->isEmpty());
        }
    }
}
