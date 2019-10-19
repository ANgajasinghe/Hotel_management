<?php

namespace Illuminate\Foundation\Testing;

use Faker\Factory;
use Faker\Generator;

trait WithFaker
{
    /**
     * The Faker instance.
     *
     * @var Generator
     */
    protected $faker;

    /**
     * Setup up the Faker instance.
     *
     * @return void
     */
    protected function setUpFaker()
    {
        $this->faker = $this->makeFaker();
    }

    /**
     * Create a Faker instance for the given locale.
     *
     * @param string|null $locale
     * @return Generator
     */
    protected function makeFaker($locale = null)
    {
        return Factory::create($locale ?? Factory::DEFAULT_LOCALE);
    }

    /**
     * Get the default Faker instance for a given locale.
     *
     * @param string|null $locale
     * @return Generator
     */
    protected function faker($locale = null)
    {
        return is_null($locale) ? $this->faker : $this->makeFaker($locale);
    }
}
