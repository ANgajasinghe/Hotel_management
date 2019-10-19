<?php

namespace Illuminate\Session;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
use SessionHandlerInterface;

class EncryptedStore extends Store
{
    /**
     * The encrypter instance.
     *
     * @var EncrypterContract
     */
    protected $encrypter;

    /**
     * Create a new session instance.
     *
     * @param string $name
     * @param SessionHandlerInterface $handler
     * @param EncrypterContract $encrypter
     * @param string|null $id
     * @return void
     */
    public function __construct($name, SessionHandlerInterface $handler, EncrypterContract $encrypter, $id = null)
    {
        $this->encrypter = $encrypter;

        parent::__construct($name, $handler, $id);
    }

    /**
     * Get the encrypter instance.
     *
     * @return EncrypterContract
     */
    public function getEncrypter()
    {
        return $this->encrypter;
    }

    /**
     * Prepare the raw string data from the session for unserialization.
     *
     * @param string $data
     * @return string
     */
    protected function prepareForUnserialize($data)
    {
        try {
            return $this->encrypter->decrypt($data);
        } catch (DecryptException $e) {
            return serialize([]);
        }
    }

    /**
     * Prepare the serialized session data for storage.
     *
     * @param string $data
     * @return string
     */
    protected function prepareForStorage($data)
    {
        return $this->encrypter->encrypt($data);
    }
}
