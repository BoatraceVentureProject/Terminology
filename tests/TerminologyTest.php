<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\Terminology;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class TerminologyTest extends PHPUnitTestCase
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected Collection $collection;

    /**
     * @return void
     */
    public function setUp(): void
    {
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
        $this->assertNull(Terminology::null());
    }

    /**
     * @return void
     */
    public function testClassById(): void
    {
        foreach ($this->collection->get('class')->pluck('id') as $index => $terminologyId) {
            $this->assertTrue(Terminology::classById($terminologyId)->diff(
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
            $this->assertTrue(Terminology::classByName($terminologyName)->diff(
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
            $this->assertTrue(Terminology::classByShortName($terminologyShortName)->diff(
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
            $this->assertTrue(Terminology::directionById($terminologyId)->diff(
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
            $this->assertTrue(Terminology::directionByName($terminologyName)->diff(
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
            $this->assertTrue(Terminology::placeById($terminologyId)->diff(
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
            $this->assertTrue(Terminology::placeByName($terminologyName)->diff(
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
            $this->assertTrue(Terminology::placeByShortName($terminologyShortName)->diff(
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
            $this->assertTrue(Terminology::techniqueById($terminologyId)->diff(
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
            $this->assertTrue(Terminology::techniqueByName($terminologyName)->diff(
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
            $this->assertTrue(Terminology::techniqueByShortName($terminologyShortName)->diff(
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
            $this->assertTrue(Terminology::weatherById($terminologyId)->diff(
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
            $this->assertTrue(Terminology::weatherByName($terminologyName)->diff(
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
            $this->assertTrue(Terminology::weatherByShortName($terminologyShortName)->diff(
                $this->collection->get('weather')->get($index)
            )->isEmpty());
        }
    }
}
