<?php

namespace Igniter\Coupons\Actions;

use Carbon\Carbon;
use Igniter\Coupons\Models\Coupons_history_model;
use Igniter\Flame\Cart\CartCondition;
use Igniter\Flame\Traits\ExtensionTrait;
use Illuminate\Support\Facades\Event;
use System\Actions\ModelAction;

class RedeemsCoupon extends ModelAction
{
    use ExtensionTrait;

    /**
     * Redeem coupon by order
     * @param $couponCondition
     * @throws \Exception
     */
    public function redeemCoupon($couponCondition)
    {
        if (!$couponCondition instanceof CartCondition) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid argument, expected %s, got %s',
                CartCondition::class, get_class($couponCondition)
            ));
        }

        if (!$couponLog = $this->logCouponHistory($couponCondition))
            return false;

        $couponLog->status = 1;
        $couponLog->created_at = Carbon::now();
        $couponLog->save();

        Event::fire('admin.order.couponRedeemed', [$couponLog]);
    }

    /**
     * Add cart coupon to order by order_id
     *
     * @param \Admin\Models\Orders_model $order
     * @param \Igniter\Flame\Cart\CartCondition $couponCondition
     * @param \Admin\Models\Customers_model $customer
     *
     * @return int|bool
     */
    public function logCouponHistory($couponCondition)
    {
        // Make sure order model exists
        if (!$this->model->exists)
            return false;

        return Coupons_history_model::createHistory($couponCondition, $this->model);
    }
}
