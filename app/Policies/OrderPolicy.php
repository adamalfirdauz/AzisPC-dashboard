<?php

namespace App\Policies;

use App\User;
use App\Orders;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Orders $order)
    {
        return $user->ownsOrder($order);
    }
    public function delete(User $user, Orders $order)
    {
        return $user->ownsOrder($order);
    }
}
