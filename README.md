# resolve-utilities

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stoyantodorov/resolve-utilities.svg?style=flat-square)](https://packagist.org/packages/stoyantodorov/resolve-utilities)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/stoyantodorov/resolve-utilities/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/stoyantodorov/resolve-utilities/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/stoyantodorov/resolve-utilities/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/stoyantodorov/resolve-utilities/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/stoyantodorov/resolve-utilities.svg?style=flat-square)](https://packagist.org/packages/stoyantodorov/resolve-utilities)

This package offers a way to instantiate a class, to send typed input to it and to receive typed result using a convenient interface:
```php
public function useUtility(string $abstract, array $input): mixed
```
That is implemented by `Resolver` class. It takes care to there are no duplicated instances and resets input/output in them before using.
<br>
The instantiated class should extend `StoyanTodorov\ResolveUtilities\Utility` - so it is obliged to implement method `execute`:
```php
abstract public function execute(): self
```
Тhe data sent to `useUtility` through `array $input` is available as class properties in the instance. The output, that we expect, should be set in `output` property. In this way we may rely on typed input and output without binding the executed code to a certain interface.

## Requirements

- `PHP 8.1`

- `Laravel`

## Installation

```bash
composer require stoyantodorov/resolve-utilities
```

## Usage

##### Extend Utility
```php
use StoyanTodorov\ResolveUtilities\Utility;

class StringOutputExample extends Utility
{
    protected string $output;

    protected string|null $propOne = null;
    protected int|null $propTwo = null;
    
    protected array $requiredInput = ['propOne'];
    protected array $defaultInput = ['propTwo' => 1];

    public function execute(): Utility
    {
        $this->output = $this->propOne;

        return $this;
    }
}
```
- In `requiredInput` add the properties names which `execute` uses.
- In `defaultInput` add the properties names with theirs default values. When `useUtility` method is called these values are used unless they aren't added to the second parameter.

#### Resolver

```php
$resolver = new StoyanTodorov\ResolveUtilities\Resolver;
$resultOne = $resolver->useUtility(StringOutputExample::class, ['propOne' => 'test']);
$resultTwo = $resolver->useUtility(StringOutputExample::class, ['propOne' => 'test', 'propTwo' => 100]);
```

- The first parameter sent to `useUtility` may also be an abstract definition like `'single-output-example'`. It will be instantiated if there is such definition in `Laravel` 
[Service Container](https://laravel.com/docs/10.x/container)

#### HasResolver

```php
use StoyanTodorov\ResolveUtilities\HasResolver;

class ExampleClient 
{
    use HasResolver;
    
    public function test(string $propOne): string
    {
        return $this->useUtility(StringOutputExample::class, compact('propOne'));
    }
}
$result = (new ExampleClient)->test('test');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
