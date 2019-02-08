<?php
declare(strict_types=1);

namespace Divante\CartSync\Service;

/**
 * Interface SyncInterface
 */
interface SyncInterface
{

    /**
     * @param int $customerId
     * @param int $cartId
     *
     * @return SyncInterface|false
     */
    public function synchronizeCustomerCart($customerId, $cartId);

    /**
     * @param string $cartId
     *
     * @return SyncInterface|false
     */
    public function synchronizeGuestCart(string $cartId);
}
