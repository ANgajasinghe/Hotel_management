<?php

namespace Dotenv;

use Dotenv\Exception\ValidationException;

/**
 * This is the validator class.
 *
 * It's responsible for applying validations against a number of variables.
 */
class Validator
{
    /**
     * The variables to validate.
     *
     * @var string[]
     */
    protected $variables;

    /**
     * The loader instance.
     *
     * @var Loader
     */
    protected $loader;

    /**
     * Create a new validator instance.
     *
     * @param string[] $variables
     * @param Loader $loader
     *
     * @return void
     * @throws ValidationException
     *
     */
    public function __construct(array $variables, Loader $loader)
    {
        $this->variables = $variables;
        $this->loader = $loader;

        $this->assertCallback(
            function ($value) {
                return $value !== null;
            },
            'is missing'
        );
    }

    /**
     * Assert that the callback returns true for each variable.
     *
     * @param callable $callback
     * @param string $message
     *
     * @return Validator
     * @throws ValidationException
     *
     */
    protected function assertCallback(callable $callback, $message = 'failed callback assertion')
    {
        $failing = [];

        foreach ($this->variables as $variable) {
            if ($callback($this->loader->getEnvironmentVariable($variable)) === false) {
                $failing[] = sprintf('%s %s', $variable, $message);
            }
        }

        if (count($failing) > 0) {
            throw new ValidationException(sprintf(
                'One or more environment variables failed assertions: %s.',
                implode(', ', $failing)
            ));
        }

        return $this;
    }

    /**
     * Assert that each variable is not empty.
     *
     * @return Validator
     * @throws ValidationException
     *
     */
    public function notEmpty()
    {
        return $this->assertCallback(
            function ($value) {
                return strlen(trim($value)) > 0;
            },
            'is empty'
        );
    }

    /**
     * Assert that each specified variable is an integer.
     *
     * @return Validator
     * @throws ValidationException
     *
     */
    public function isInteger()
    {
        return $this->assertCallback(
            function ($value) {
                return ctype_digit($value);
            },
            'is not an integer'
        );
    }

    /**
     * Assert that each specified variable is a boolean.
     *
     * @return Validator
     * @throws ValidationException
     *
     */
    public function isBoolean()
    {
        return $this->assertCallback(
            function ($value) {
                if ($value === '') {
                    return false;
                }

                return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null;
            },
            'is not a boolean'
        );
    }

    /**
     * Assert that each variable is amongst the given choices.
     *
     * @param string[] $choices
     *
     * @return Validator
     * @throws ValidationException
     *
     */
    public function allowedValues(array $choices)
    {
        return $this->assertCallback(
            function ($value) use ($choices) {
                return in_array($value, $choices, true);
            },
            sprintf('is not one of [%s]', implode(', ', $choices))
        );
    }
}
