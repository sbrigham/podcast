<?php

use Brigham\Podcast\Repositories\EloquentPodcastRepository;
use Brigham\Podcast\Services\PodcastUpdater;
use Illuminate\Foundation\Testing\TestCase;
use Mockery;

class PodcastUpdaterTest extends TestCase {

    public function setUp()
    {
        // Just overriding the base setup.
    }

    /** @test */
    public function it_works()
    {
        $this->assertTrue(true);
    }

    /**
     * Creates the application.
     *
     * Needs to be implemented by subclasses.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__.'/../../bootstrap/testing.php';
    }
}
 