<?php

namespace StoyanTodorov\ResolveUtilities;

use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;

abstract class Utility
{
    protected mixed $output;

    /**
     * @var array [
     *     'notNullableProperty'      => 'notNull',
     *     'propertyWithDefaultValue' => 'defaultValue',
     * ]
     */
    protected array $inputProperties = [];

    /**
     * @var array [
     *     'NULL',
     *     'string',
     *     'int',
     *     'double',
     *     'bool',
     *     'array',
     *     'object',
     *     'callable',
     *     'resource',
     *     'iterable',
     *     'ClassNamespace'
     * ]
     */
    protected array $outputTypes = ['NULL'];

    /**
     * @return self
     */
    abstract public function execute(): self;

    /**
     * @throws InvalidPropertyException
     */
    public function setInput(array $properties): self
    {
        foreach ($this->inputProperties as $property => $default) {
            if (in_array($property, $properties, true)) {
                $this->$property = $properties[$property];
                continue;
            }
            if ($default !== 'notNull') {
                $this->$property = $default;
                continue;
            }
            $this->invalidProperty($property, 'null');
        }

        $this->output = null;

        return $this;
    }

    /**
     * @throws InvalidPropertyException
     */
    public function getOutput(): mixed
    {
        $this->validateOutput();

        return $this->output;
    }

    /**
     * @throws InvalidPropertyException
     */
    protected function validateOutput(): void
    {
        $outputType = $this->getType($this->output);
        if (in_array($outputType, $this->outputTypes, true)) {
            return;
        }
        $this->invalidProperty('output', $outputType);
    }

    protected function getType(mixed $value): string
    {
        $type = gettype($value);
        if ($type === 'object') {
            $type = get_class($value);
        }

        return $type;
    }

    /**
     * @throws InvalidPropertyException
     */
    protected function invalidProperty(string $propertyName, string $type): never
    {
        $class = self::class;
        throw new InvalidPropertyException("{$propertyName} property in {$class} can not be {$type}.");
    }
}
