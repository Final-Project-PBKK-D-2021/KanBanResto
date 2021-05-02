<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductForm extends Component
{
    public string $form_action;
    public string $action_name;
    public ?string $product_id;
    public ?string $product_name;
    public ?int $product_price;
    public ?string $product_badge;
    public ?string $product_description;

    /**
     * productForm constructor.
     * @param $formAction
     * @param $actionName
     * @param $productId
     * @param $productName
     * @param $productDescription
     */
    public function __construct(string $formAction, string $actionName, ?string $productId, ?string $productName, ?int $productPrice, ?string $productDescription, ?string $productBadge)
    {
        $this->form_action = $formAction;
        $this->action_name = $actionName;
        $this->product_id = $productId;
        $this->product_name = $productName;
        $this->product_price = $productPrice;
        $this->product_description = $productDescription;
        $this->product_badge = $productBadge;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('KanBan::product.components.product-form');
    }
}
