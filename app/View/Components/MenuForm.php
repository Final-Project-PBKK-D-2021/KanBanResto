<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuForm extends Component
{
    public string $form_action;
    public string $action_name;
    public ?string $menu_id;
    public ?string $menu_name;
    public ?string $menu_description;
    public ?array $products;

    /**
     * MenuForm constructor.
     * @param $formAction
     * @param $actionName
     * @param $menuId
     * @param $menuName
     * @param $menuDescription
     * @param $products
     */
    public function __construct(string $formAction, string $actionName, ?string $menuId, ?string $menuName, ?string $menuDescription, ?array $products)
    {
        $this->form_action = $formAction;
        $this->action_name = $actionName;
        $this->menu_id = $menuId;
        $this->menu_name = $menuName;
        $this->menu_description = $menuDescription;
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('KanBan::menu.components.menu-form');
    }
}
