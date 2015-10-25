# Phony

*Mocks, stubs, and spies for PHP.*

[![The most recent stable version is 0.5.1][version-image]][semantic versioning]
[![Current build status image][build-image]][current build status]
[![Current coverage status image][coverage-image]][current coverage status]

[build-image]: http://img.shields.io/travis/eloquent/phony/develop.svg?style=flat-square "Current build status for the develop branch"
[current build status]: https://travis-ci.org/eloquent/phony
[coverage-image]: https://img.shields.io/codecov/c/github/eloquent/phony/develop.svg?style=flat-square "Current test coverage for the develop branch"
[current coverage status]: https://codecov.io/github/eloquent/phony
[semantic versioning]: http://semver.org/
[version-image]: http://img.shields.io/:semver-0.5.1-yellow.svg?style=flat-square "This project uses semantic versioning"

## Installation and documentation

- Available as [Composer] package [eloquent/phony].
- Read the [manual].

[composer]: http://getcomposer.org/
[eloquent/phony]: https://packagist.org/packages/eloquent/phony

## What is *Phony*?

*Phony* is a PHP library for creating [test doubles]. *Phony* has first-class
support for many modern PHP features such as [traits] and [generators], and
supports PHP 7 and [HHVM].

[generators]: http://php.net/language.generators.overview
[hhvm]: http://hhvm.com/
[test doubles]: https://en.wikipedia.org/wiki/Test_double
[traits]: http://php.net/traits

## Usage

For detailed usage, see the [manual].

### Standalone usage

```php
use function Eloquent\Phony\mock;

$handle = mock('ClassA');
$handle->methodA('argument')->returns('value');

$mock = $handle->mock();

assert($mock->methodA('argument') === 'value');
$handle->methodA->calledWith('argument');
```

### Peridot usage

```php
use function Eloquent\Phony\mock;

describe('Phony', function () {
    it('integrates with Peridot', function () {
        $handle = mock('ClassA');
        $handle->methodA('argument')->returns('value');

        $mock = $handle->mock();

        expect($mock->methodA('argument'))->to->equal('value');
        $handle->methodA->calledWith('argument');
    });
});
```

### Pho usage

```php
use function Eloquent\Phony\Pho\mock;

describe('Phony', function () {
    it('integrates with Pho', function () {
        $handle = mock('ClassA');
        $handle->methodA('argument')->returns('value');

        $mock = $handle->mock();

        expect($mock->methodA('argument'))->toBe('value');
        $handle->methodA->calledWith('argument');
    });
});
```

### PHPUnit usage

```php
use Eloquent\Phony\Phpunit\Phony;

class PhonyTest extends PHPUnit_Framework_TestCase
{
    public function testIntegration()
    {
        $handle = Phony::mock('ClassA');
        $handle->methodA('argument')->returns('value');

        $mock = $handle->mock();

        $this->assertSame('value', $mock->methodA('argument'));
        $handle->methodA->calledWith('argument');
    }
}
```

### SimpleTest usage

```php
use Eloquent\Phony\Simpletest\Phony;

class PhonyTest extends UnitTestCase
{
    public function testIntegration()
    {
        $handle = Phony::mock('ClassA');
        $handle->methodA('argument')->returns('value');

        $mock = $handle->mock();

        $this->assertSame($mock->methodA('argument'), 'value');
        $handle->methodA->calledWith('argument');
    }
}
```

[manual]: doc/index.md
