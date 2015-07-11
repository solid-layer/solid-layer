<?php

use Mockery as m;
use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Services\Service\ServiceProvider;

class ProviderTest extends PHPUnit_Framework_TestCase
{
    public function sampleDiContent()
    {
        return [true, false, 123, '123'];
    }

    public function tearDown()
    {
        m::close();
    }

    public function testService()
    {
        $provider = m::mock('App\Providers\ACL');
        $provider
            ->shouldReceive(
                'register'
            )
            ->once()
            ->andReturn($this);

        $provider
            ->shouldReceive('getAlias')
            ->once()
            ->andReturn('servicetest');

        $provider
            ->shouldReceive('callRegister')
            ->once()
            ->andReturn($provider->register());

        $provider
            ->shouldReceive('getShared')
            ->once()
            ->andReturn(true);

        $container = new ServiceContainer;
        $container->addServiceProvider($provider);


        # assert should be instance of ServiceProvider::class
        $this->assertInstanceOf(ServiceProvider::class, $provider);

        # assert via array subset, in the first place, the di()
        # should already injected the 'servicetest' and it should
        # be pullable
        $this->assertArraySubset(
            di()->get('servicetest')->sampleDiContent(),
            $this->sampleDiContent()
        );
    }
}