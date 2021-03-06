<?php

namespace DarkGhostHunter\TransbankApi\Contracts;

/**
 * Interface TransactionInterface
 *
 * A transaction works like a resource. It holds a reference to the service object it belongs to.
 * This allows the transaction to be committed to Transbank, and save the response inside it.
 * Since all transactions share common properties and methods, the only thing differencing
 * the Transaction is its 'type', which should be set by the Service. Some transactions
 * may need a different Transaction implementing this interface to better suit itself.
 *
 * @package DarkGhostHunter\TransbankApi\Contracts
 */
interface TransactionInterface
{
    /**
     * Set the Transaction type
     *
     * @param string $type
     */
    public function setType(string $type);

    /**
     * Return the Transaction type
     *
     * @return string
     */
    public function getType();

    /**
     * Sets the Service to be used for this Transaction
     *
     * @param ServiceInterface $service
     */
    public function setService(ServiceInterface $service);

    /**
     * Returns the Service used by this Transaction
     *
     * @return ServiceInterface
     */
    public function getService();

    /**
     * Set default attributes for the Item
     *
     * @param array $defaults
     */
    public function setDefaults(array $defaults);

    /**
     * Commits the transaction to Transbank and return a response
     *
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse
     */
    public function commit();

    /**
     * Forcefully commits the transaction to Transbank
     *
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse
     */
    public function forceCommit();

    /**
     * Serializes the object to a string
     *
     * @return string
     */
    public function __toString();
}