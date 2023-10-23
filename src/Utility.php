<?php

namespace StoyanTodorov\ResolveUtilities;

use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;

abstract class Utility
{
    /**
    * @var array ['propertyName']
    */
    protected array $requiredInput = [];

    /**
     * @var array ['propertyName' => 'defaultValue]
     */
    protected array $defaultInput = [];

    /**
     * @return self
     */
    abstract public function execute(): self;

    /**
     * @throws InvalidPropertyException
     */
    public function resetInput(array $input): self
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

        return $this;
    }

    public function getOutput(): mixed
    {
        return $this->output;
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
