<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $baseUri = '';

    protected function makeUrl($url = ''): string
    {
        return rtrim(rtrim($this->baseUri, '/') . '/' . ltrim($url, '/'), '/');
    }
}
