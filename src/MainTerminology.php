<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @author shimomo
 */
class MainTerminology
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected Collection $terminologies;

    /**
     * @return void
     */
    public function __construct()
    {
        Collection::macro('recursive', fn() => $this->map(fn($value) =>
            is_array($value) || is_object($value)
                ? collect($value)->recursive()
                : $value
        ));
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public function __call(string $name, array $arguments): ?Collection
    {
        if (! preg_match('/^(.+)By(.+)$/u', $name, $matches)) {
            return null;
        }

        if (! count($arguments)) {
            return null;
        }

        $match1 = Str::snake($matches[1]);
        $match2 = Str::snake($matches[2]);

        $this->terminologies ??= collect();
        if (! $this->terminologies->has($match1)) {
            if (! file_exists($fileName = __DIR__ . '/../config/terminologies/' . $match1 . '.php')) {
                return null;
            }

            $this->terminologies->put($match1, collect(
                require $fileName
            )->recursive());
        }

        $terminologies = $this->terminologies->get($match1)->keyBy($match2);
        if ($terminologies->has($arguments[0])) {
            return $terminologies->get($arguments[0]);
        }

        return $terminologies->filter(fn($value, $key) =>
            Str::contains($key, $arguments[0])
        )->last();
    }
}
