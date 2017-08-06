# A guzzle middleware for JWT authentication.

[![codecov](https://codecov.io/gh/gmponos/guzzleJwt/branch/master/graph/badge.svg)](https://codecov.io/gh/gmponos/guzzleJwt)
[![Build Status](https://travis-ci.org/gmponos/guzzleJwt.svg?branch=master)](https://travis-ci.org/gmponos/guzzleJwt)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/977b400a-bae5-4d8a-8db0-2185f0e48318/big.png)](https://insight.sensiolabs.com/projects/977b400a-bae5-4d8a-8db0-2185f0e48318)

Goal of this package is to provide a set of useful classes in order to use a JWT authentication with Guzzle.

## Description

I will not proceed with creating classes that implement the `AuthenticatorInterface`. The AuthenticatorInterface
can be implemented by the developer who uses the package.

## Install

You can install the package using composer

`composer require webthink/guzzle-jwt`

## Usage

### Basic Usage

As a first step you need to implement your own Authenticator.

```
class MyAuthenticator implements AuthenticatorInterface
{
    public function authenticate($username, $password)
    {
    // code.. and return a TokenInterface.
    }
}
```

Then you need to append into your handler stack the middleware provided by the package.

```
// Your handler stack
$stack = HandlerStack::create();

// Add middleware
$stack->append(new Middleware($myAuthenticator));

$httpClient = new Client([
    'handler' => $stack,
    'jwt' => [
        'username' => 'username',
        'password' => 'password',
    ],
]);

$response = $httClient->get('/my_api_that_requires_jwt_token');
```

### Storages

Storages are a way of caching JWT between multiple requests. Depending on the storage the token can for using it
for more than one HTTP Request.

In order to use the storage you will need either to implement an Authenticator of your own that will use the storage
or use the `StoreAuthenticator`

```
$myAuthenticator = new MyAuthenticator();
$storeAuthenticator = new StoreAuthenticator($myAuthenticator, new MemoryStorage());
```

Then you can pass the store authenticator in the middleware and follow the procedure described above.

## Contributing

Feel free to comment on anything you might believe it's going in the wrong direction or even better contribute with a PR.

## Todo

- Increase UnitTests.
- Investigate the possibility of including some authenticators.

## Credits

- [George Mponos](https://github.com/gmponos)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.