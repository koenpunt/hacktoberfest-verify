<?php
/**
 * Redis cache service
 */

namespace AppBundle\Service;

use Predis\Client;

class RedisCacheService
{
    protected $client;

    public function __construct($url = null)
    {
        $this->client = new Client($url);
    }

    public function save($key, $content)
    {
        $this->client->set($key, serialize($content));
    }

    public function fetch($key)
    {
        return unserialize($this->client->get($key));
    }
}
