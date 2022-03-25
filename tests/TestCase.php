<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected $baseUri = '';

    protected function makeUrl($url = ''): string
    {
        return rtrim(rtrim($this->baseUri, '/') . '/' . ltrim($url, '/'), '/');
    }
    use CreatesApplication;
}
