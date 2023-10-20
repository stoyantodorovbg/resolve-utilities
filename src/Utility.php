<?php

namespace StoyanTodorov\ResolveUtilities;

use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;

abstract class Utility
{
    protected mixed $output;

    /**
     * @var array [
     *     'requiredProperty'         => 'required',
     *     'propertyWithDefaultValue' => 'defaultValue',
     * ]
     */
    protected array $inputProperties = [];

    /**
     * @var array [
     *     'NULL',
     *     'boolean',
     *     'string',
     *     'integer',
     *     'double',
     *     'array',
     *     'object',
     *     'ClassNamespace'
     * ]
     */
    protected array $outputTypes = [];

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
            if (array_key_exists($property, $properties)) {
                $this->$property = $properties[$property];
                continue;
            }
            if ($default !== 'required') {
                $this->$property = $default;
                continue;
            }
            $this->missingProperty($property);
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
        if ($type !== OutputType::OBJECT->value) {
            return $type;
        }

        $class = get_class($value);

        if ($class !== 'stdClass') {
            return $class;
        }

        return OutputType::OBJECT->value;
    }

    /**
     * @throws InvalidPropertyException
     */
    protected function invalidProperty(string $propertyName, string $type): never
    {
        $class = get_class($this);
        throw new InvalidPropertyException("{$propertyName} property in {$class} should not be {$type}.");
    }

    /**
     * @throws InvalidPropertyException
     */
    protected function missingProperty(string $propertyName): never
    {
        $class = get_class($this);
        throw new InvalidPropertyException("{$propertyName} property in {$class} should presents.");
    }
}
