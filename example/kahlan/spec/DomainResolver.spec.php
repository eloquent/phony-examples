<?php

namespace Example\Dns;

use function Eloquent\Phony\Kahlan\on;
use function Eloquent\Phony\Kahlan\restoreGlobalFunctions;
use function Eloquent\Phony\Kahlan\stubGlobal;
use Psr\SimpleCache\CacheInterface;
use RuntimeException;

describe('DomainResolver', function () {
    beforeEach(function (CacheInterface $cache) {
        $this->resolver = new DomainResolver($cache);

        $this->cache = on($cache);
        $this->gethostbyname = stubGlobal('gethostbyname', __NAMESPACE__);
    });

    afterEach(function () {
        restoreGlobalFunctions();
    });

    describe('resolve()', function () {
        context('when there is a matching cache entry', function () {
            beforeEach(function () {
                $this->cache->get->returns('1.1.1.1');
            });

            it('should return the cached entry', function () {
                $address = $this->resolver->resolve('example.org.');

                expect($address)->toBe('1.1.1.1');
                $this->cache->get->calledWith('example.org.');
            });

            it('should not attempt to resolve the name again', function () {
                $this->resolver->resolve('example.org.');

                $this->gethostbyname->never()->called();
            });

            it('should not overwrite the cache entry', function () {
                $this->resolver->resolve('example.org.');

                $this->cache->set->never()->called();
            });
        });

        context('when there is no matching cache entry', function () {
            beforeEach(function () {
                $this->gethostbyname->returns('1.1.1.1');
                $this->cache->set->returns(true);
            });

            it('should return the lookup result', function () {
                $address = $this->resolver->resolve('example.org.');

                expect($address)->toBe('1.1.1.1');
                $this->gethostbyname->calledWith('example.org.');
            });

            it('should create a cache entry', function () {
                $this->resolver->resolve('example.org.');

                $this->cache->set->calledWith('example.org.', '1.1.1.1');
            });
        });

        context('when domain lookup fails', function () {
            beforeEach(function () {
                $this->gethostbyname->returnsArgument();
            });

            it('should throw an exception', function () {
                $resolve = function () {
                    $this->resolver->resolve('example.org.');
                };

                expect($resolve)->toThrow(new RuntimeException('Unable to resolve.'));
            });

            it('should not create a cache entry', function () {
                $resolve = function () {
                    $this->resolver->resolve('example.org.');
                };

                expect($resolve)->toThrow();
                $this->cache->set->never()->called();
            });
        });

        context('when cache entry creation fails', function () {
            beforeEach(function () {
                $this->gethostbyname->returns('1.1.1.1');
                $this->cache->set->returns(false);
            });

            it('should throw an exception', function () {
                $resolve = function () {
                    $this->resolver->resolve('example.org.');
                };

                expect($resolve)->toThrow(new RuntimeException('Unable to cache.'));
            });
        });
    });
});
