<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OrderForm extends Component
{
    public string $form_action;
    public ?string $order_id;
    public string $action_name;
    public ?string $order_name;
    public ?int $order_total_price;


    /**
     * orderForm constructor.
     * @param $formAction
     * @param $actionName
     * @param $orderId
     * @param $orderName
     * @param $orderDescription
     */
    public function __construct(string $formAction, string $actionName, ?string $orderId, ?string $orderName, ?int $orderTotalPrice)
    {
        $this->form_action = $formAction;
        $this->action_name = $actionName;
        $this->order_id = $orderId;
        $this->order_name = $orderName;
        $this->order_total_price = $orderTotalPrice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('KanBan::order.components.order-form');
    }
}
