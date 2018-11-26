<?php


namespace DarkGhostHunter\TransbankApi\WebpaySoap\Concerns;

use DarkGhostHunter\TransbankApi\Helpers\Fluent;

/**
 * Trait AcknowledgesTransactions
 * @package DarkGhostHunter\TransbankApi\WebpaySoap\Concerns
 *
 * @mixin \DarkGhostHunter\TransbankApi\WebpaySoap\Transaction
 */
trait AcknowledgesTransactions
{
    /**
     * Notifies WebpaySoap that the Transaction has been accepted
     *
     * @param $transaction
     * @return object
     */
    protected function performConfirm($transaction)
    {
        return $this->connector->acknowledgeTransaction($transaction);
    }

    /**
     * Acknowledges and accepts the Transaction
     *
     * @param $token
     * @return array
     */
    public function confirm($token)
    {
        $acknowledgeTransaction = new Fluent([
            'tokenInput' => $token
        ]);

        $this->performConfirm($acknowledgeTransaction);

        // Since we don't need any result, return the validation as an array
        return [$this->validate()];
    }
}
