<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

/**
 * A Mailbox Address MIME Header for something like From or Sender.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Headers_MailboxHeader extends Swift_Mime_Headers_AbstractHeader
{
    /**
     * The mailboxes used in this Header.
     *
     * @var string[]
     */
    private $mailboxes = [];

    /**
     * The strict EmailValidator.
     *
     * @var EmailValidator
     */
    private $emailValidator;

    private $addressEncoder;

    /**
     * Creates a new MailboxHeader with $name.
     *
     * @param string $name of Header
     */
    public function __construct($name, Swift_Mime_HeaderEncoder $encoder, EmailValidator $emailValidator, Swift_AddressEncoder $addressEncoder = null)
    {
        $this->setFieldName($name);
        $this->setEncoder($encoder);
        $this->emailValidator = $emailValidator;
        $this->addressEncoder = $addressEncoder ?? new Swift_AddressEncoder_IdnAddressEncoder();
    }

    /**
     * Get the type of Header that this instance represents.
     *
     * @return int
     * @see TYPE_DATE, TYPE_ID, TYPE_PATH
     *
     * @see TYPE_TEXT, TYPE_PARAMETERIZED, TYPE_MAILBOX
     */
    public function getFieldType()
    {
        return self::TYPE_MAILBOX;
    }

    /**
     * Set the model for the field body.
     *
     * This method takes a string, or an array of addresses.
     *
     * @param mixed $model
     *
     * @throws Swift_RfcComplianceException
     */
    public function setFieldBodyModel($model)
    {
        $this->setNameAddresses($model);
    }

    /**
     * Set a list of mailboxes to be shown in this Header.
     *
     * The mailboxes can be a simple array of addresses, or an array of
     * key=>value pairs where (email => personalName).
     * Example:
     * <code>
     * <?php
     * //Sets two mailboxes in the Header, one with a personal name
     * $header->setNameAddresses(array(
     *  'chris@swiftmailer.org' => 'Chris Corbyn',
     *  'mark@swiftmailer.org' //No associated personal name
     *  ));
     * ?>
     * </code>
     *
     * @param string|string[] $mailboxes
     *
     * @throws Swift_RfcComplianceException
     * @see setValue()
     *
     * @see __construct()
     * @see setAddresses()
     */
    public function setNameAddresses($mailboxes)
    {
        $this->mailboxes = $this->normalizeMailboxes((array)$mailboxes);
        $this->setCachedValue(null); //Clear any cached value
    }

    /**
     * Normalizes a user-input list of mailboxes into consistent key=>value pairs.
     *
     * @param string[] $mailboxes
     *
     * @return string[]
     */
    protected function normalizeMailboxes(array $mailboxes)
    {
        $actualMailboxes = [];

        foreach ($mailboxes as $key => $value) {
            if (is_string($key)) {
                //key is email addr
                $address = $key;
                $name = $value;
            } else {
                $address = $value;
                $name = null;
            }
            $this->assertValidAddress($address);
            $actualMailboxes[$address] = $name;
        }

        return $actualMailboxes;
    }

    /**
     * Throws an Exception if the address passed does not comply with RFC 2822.
     *
     * @param string $address
     *
     * @throws Swift_RfcComplianceException If invalid.
     */
    private function assertValidAddress($address)
    {
        if (!$this->emailValidator->isValid($address, new RFCValidation())) {
            throw new Swift_RfcComplianceException(
                'Address in mailbox given [' . $address . '] does not comply with RFC 2822, 3.6.2.'
            );
        }
    }

    /**
     * Get the model for the field body.
     *
     * This method returns an associative array like {@link getNameAddresses()}
     *
     * @return array
     * @throws Swift_RfcComplianceException
     *
     */
    public function getFieldBodyModel()
    {
        return $this->getNameAddresses();
    }

    /**
     * Get all mailboxes in this Header as key=>value pairs.
     *
     * The key is the address and the value is the name (or null if none set).
     * Example:
     * <code>
     * <?php
     * $header = new Swift_Mime_Headers_MailboxHeader('From',
     *  array('chris@swiftmailer.org' => 'Chris Corbyn',
     *  'mark@swiftmailer.org' => 'Mark Corbyn')
     *  );
     * print_r($header->getNameAddresses());
     * // array (
     * // chris@swiftmailer.org => Chris Corbyn,
     * // mark@swiftmailer.org => Mark Corbyn
     * // )
     * ?>
     * </code>
     *
     * @return string[]
     * @see getNameAddressStrings()
     *
     * @see getAddresses()
     */
    public function getNameAddresses()
    {
        return $this->mailboxes;
    }

    /**
     * Get the full mailbox list of this Header as an array of valid RFC 2822 strings.
     *
     * Example:
     * <code>
     * <?php
     * $header = new Swift_Mime_Headers_MailboxHeader('From',
     *  array('chris@swiftmailer.org' => 'Chris Corbyn',
     *  'mark@swiftmailer.org' => 'Mark Corbyn')
     *  );
     * print_r($header->getNameAddressStrings());
     * // array (
     * // 0 => Chris Corbyn <chris@swiftmailer.org>,
     * // 1 => Mark Corbyn <mark@swiftmailer.org>
     * // )
     * ?>
     * </code>
     *
     * @return string[]
     * @throws Swift_RfcComplianceException
     *
     * @see getNameAddresses()
     * @see toString()
     *
     */
    public function getNameAddressStrings()
    {
        return $this->createNameAddressStrings($this->getNameAddresses());
    }

    /**
     * Return an array of strings conforming the the name-addr spec of RFC 2822.
     *
     * @param string[] $mailboxes
     *
     * @return string[]
     */
    private function createNameAddressStrings(array $mailboxes)
    {
        $strings = [];

        foreach ($mailboxes as $email => $name) {
            $mailboxStr = $this->addressEncoder->encodeString($email);
            if (null !== $name) {
                $nameStr = $this->createDisplayNameString($name, empty($strings));
                $mailboxStr = $nameStr . ' <' . $mailboxStr . '>';
            }
            $strings[] = $mailboxStr;
        }

        return $strings;
    }

    /**
     * Produces a compliant, formatted display-name based on the string given.
     *
     * @param string $displayName as displayed
     * @param bool $shorten the first line to make remove for header name
     *
     * @return string
     */
    protected function createDisplayNameString($displayName, $shorten = false)
    {
        return $this->createPhrase($this, $displayName, $this->getCharset(), $this->getEncoder(), $shorten);
    }

    /**
     * Makes this Header represent a list of plain email addresses with no names.
     *
     * Example:
     * <code>
     * <?php
     * //Sets three email addresses as the Header data
     * $header->setAddresses(
     *  array('one@domain.tld', 'two@domain.tld', 'three@domain.tld')
     *  );
     * ?>
     * </code>
     *
     * @param string[] $addresses
     *
     * @throws Swift_RfcComplianceException
     * @see setNameAddresses()
     * @see setValue()
     *
     */
    public function setAddresses($addresses)
    {
        $this->setNameAddresses(array_values((array)$addresses));
    }

    /**
     * Get all email addresses in this Header.
     *
     * @return string[]
     * @see getNameAddresses()
     *
     */
    public function getAddresses()
    {
        return array_keys($this->mailboxes);
    }

    /**
     * Remove one or more addresses from this Header.
     *
     * @param string|string[] $addresses
     */
    public function removeAddresses($addresses)
    {
        $this->setCachedValue(null);
        foreach ((array)$addresses as $address) {
            unset($this->mailboxes[$address]);
        }
    }

    /**
     * Get the string value of the body in this Header.
     *
     * This is not necessarily RFC 2822 compliant since folding white space will
     * not be added at this stage (see {@link toString()} for that).
     *
     * @return string
     * @throws Swift_RfcComplianceException
     *
     * @see toString()
     *
     */
    public function getFieldBody()
    {
        // Compute the string value of the header only if needed
        if (null === $this->getCachedValue()) {
            $this->setCachedValue($this->createMailboxListString($this->mailboxes));
        }

        return $this->getCachedValue();
    }

    /**
     * Creates a string form of all the mailboxes in the passed array.
     *
     * @param string[] $mailboxes
     *
     * @return string
     * @throws Swift_RfcComplianceException
     *
     */
    protected function createMailboxListString(array $mailboxes)
    {
        return implode(', ', $this->createNameAddressStrings($mailboxes));
    }

    /**
     * Redefine the encoding requirements for mailboxes.
     *
     * All "specials" must be encoded as the full header value will not be quoted
     *
     * @param string $token
     *
     * @return bool
     * @see RFC 2822 3.2.1
     *
     */
    protected function tokenNeedsEncoding($token)
    {
        return preg_match('/[()<>\[\]:;@\,."]/', $token) || parent::tokenNeedsEncoding($token);
    }
}
