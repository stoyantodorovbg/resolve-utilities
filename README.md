# resolve-utilities

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stoyantodorov/resolve-utilities.svg?style=flat-square)](https://packagist.org/packages/stoyantodorov/resolve-utilities)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/stoyantodorov/resolve-utilities/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/stoyantodorov/resolve-utilities/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/stoyantodorov/resolve-utilities/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/stoyantodorov/resolve-utilities/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/stoyantodorov/resolve-utilities.svg?style=flat-square)](https://packagist.org/packages/stoyantodorov/resolve-utilities)

This package makes it easy to follow Single Responsibility Principle without duplicating instantiated classes. 
<br>
`Utility` class extensions have method `execute` that is intended to use class properties as input parameters and to produce a result in `output` property. There is a wrapper that instantiates once `Utility` extension in its own instance, set properties and returns a result. The wrapper resets `Utility` properties every time when it is used in order to prevent a usage mess. 

## Requirements

- `PHP 8.2`

- `Laravel`

## Usage

##### Extend Utility
```php
use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class StringOutputExample extends Utility
{
    protected array $requiredInput = ['propOne'];
    protected array $defaultInput = ['propTwo' => 1];

    protected array $outputTypes = [OutputType::STRING->value];

    protected string|null $propOne = null;
    protected int|null $propTwo = null;

    public function execute(): Utility
    {
        $this->setOutput($this->propOne);

        return $this;
    }
}
```
- In `requiredInput` property add the properties names which `execute` method is going to use.
- In `defaultInput` property add the properties names with default values. Every time when `Resolver` `useUtility` is called these values will be used while they aren't sent to it in the second parameter.
- In `outputTypes` property define the allowed output types. They are defined in `OutputType` enum.

#### Use Resolver

```php
$resolver = new StoyanTodorov\ResolveUtilities\Resolver;
$resultOne = $resolver->useUtility(StringOutputExample::class, ['propOne' => 'test']);
$resultTwo = $resolver->useUtility(StringOutputExample::class, ['propOne' => 'test', 'propTwo' => 100]);
```

- `useUtility` first parameter accepts also an abstract definition like `'single-output-example'`, when there is such definition in `Laravel` 
[Service Container](https://laravel.com/docs/10.x/container)

#### Use HasResolver

```php
use StoyanTodorov\ResolveUtilities\HasResolver;

class Client 
{
    use HasResolver;
    
    public function test(string $propOne): string
    {
        return $this->useUtility(StringOutputExample::class, compact('propOne'));
    }
}
$result = (new Client)->test('test');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
