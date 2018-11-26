<?php

namespace DarkGhostHunter\TransbankApi\Contracts;

use DarkGhostHunter\TransbankApi\Responses\AbstractResponse;
use DarkGhostHunter\TransbankApi\Transbank;

/**
 * Interface TransbankServiceInterface
 *
 * The new service must receive a Transbank Configuration and use that to
 * connect to Transbank Services.
 *
 * @package DarkGhostHunter\TransbankApi\Contracts
 */
interface ServiceInterface
{
    /**
     * TransbankServiceInterface constructor.
     *
     * @param Transbank $config
     */
    public function __construct(Transbank $config);

    /**
     * Returns if the service is using a Production environment
     *
     * @return bool
     */
    public function isProduction();

    /**
     * Returns if the service is using an Integration environment
     *
     * @return bool
     */
    public function isIntegration();

    /**
     * Get the Adapter
     *
     * @return AdapterInterface
     */
    public function getAdapter();

    /**
     * Set the Adapter
     *
     * @param AdapterInterface $adapter
     */
    public function setAdapter(AdapterInterface $adapter);

    /**
     * Performs a new Transaction to Transbank Services and returns its Result
     *
     * @param TransactionInterface $transaction
     * @return AbstractResponse
     */
    public function commit(TransactionInterface $transaction);

    /**
     * Gets and Acknowledges a Transaction in Transbank
     *
     * @param $transaction
     * @param $options
     * @return AbstractResponse
     */
    public function get($transaction, $options = null);

    /**
     * Returns a new service instance using the Transbank Configuration
     *
     * @param Transbank $config
     * @return ServiceInterface|$this
     */
    public static function fromConfig(Transbank $config);
}