<?php

namespace Illuminate\Cache;

use Illuminate\Contracts\Cache\Store;

class TaggedCache extends Repository
{
    use RetrievesMultipleKeys {
        putMany as putManyAlias;
    }

    /**
     * The tag set instance.
     *
     * @var TagSet
     */
    protected $tags;

    /**
     * Create a new tagged cache instance.
     *
     * @param Store $store
     * @param TagSet $tags
     * @return void
     */
    public function __construct(Store $store, TagSet $tags)
    {
        parent::__construct($store);

        $this->tags = $tags;
    }

    /**
     * Store multiple items in the cache for a given number of seconds.
     *
     * @param array $values
     * @param int|null $ttl
     * @return bool
     */
    public function putMany(array $values, $ttl = null)
    {
        if ($ttl === null) {
            return $this->putManyForever($values);
        }

        return $this->putManyAlias($values, $ttl);
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function increment($key, $value = 1)
    {
        $this->store->increment($this->itemKey($key), $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function itemKey($key)
    {
        return $this->taggedItemKey($key);
    }

    /**
     * Get a fully qualified key for a tagged item.
     *
     * @param string $key
     * @return string
     */
    public function taggedItemKey($key)
    {
        return sha1($this->tags->getNamespace()) . ':' . $key;
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function decrement($key, $value = 1)
    {
        $this->store->decrement($this->itemKey($key), $value);
    }

    /**
     * Remove all items from the cache.
     *
     * @return bool
     */
    public function flush()
    {
        $this->tags->reset();

        return true;
    }

    /**
     * Get the tag set instance.
     *
     * @return TagSet
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Fire an event for this cache instance.
     *
     * @param string $event
     * @return void
     */
    protected function event($event)
    {
        parent::event($event->setTags($this->tags->getNames()));
    }
}
