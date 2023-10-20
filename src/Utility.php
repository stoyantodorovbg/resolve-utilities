<?php

namespace StoyanTodorov\ResolveUtilities;

use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;

abstract class Utility
{
    protected mixed $output;

    /**
    * @var array ['propertyName']
    */
    protected array $requiredInput = [];

    /**
     * @var array ['propertyName' => 'defaultValue]
     */
    protected array $defaultInput = [];

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
    public function reset(array $input): self
    {
        foreach ($this->requiredInput as $property) {
            if (array_key_exists($property, $input)) {
                $this->$property = $input[$property];
                continue;
            }
            if (array_key_exists($property, $this->defaultInput)) {
                $this->$property = $this->defaultInput[$property];
                continue;
            }
            $this->missingProperty($property);
        }

        $this->setOutput(null);

        return $this;
    }

    protected function setOutput(mixed $output): void
    {
        $this->output = $output;
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
        $message = "{$propertyName} property in {$class} should not be {$type}.";
        $this->throwInvalidProperty($message);
    }

    /**
     * @throws InvalidPropertyException
     */
    protected function missingProperty(string $propertyName): never
    {
        $class = get_class($this);
        $message = "{$propertyName} property in {$class} should presents.";
        $this->throwInvalidProperty($message);
    }

    /**
     * @throws InvalidPropertyException
     */
    protected function throwInvalidProperty(string $message): never
    {
        throw new InvalidPropertyException($message);
    }
}
