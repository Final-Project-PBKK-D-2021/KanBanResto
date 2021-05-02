<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BusinessForm extends Component
{
    public string $form_action;
    public ?string $id;
    public ?string $name;
    public ?string $description;
    public ?string $since;
    public ?string $owner_name;

    /**
     * MenuForm constructor.
     * @param $formAction
     * @param $id
     * @param $name
     * @param $description
     * @param $since
     * @param $ownerName
     */
    public function __construct(string $formAction, ?string $id, ?string $name, ?string $description, ?string $since, ?string $ownerName)
    {
        $this->form_action = $formAction;
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->since = $since;
        $this->owner_name = $ownerName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('KanBan::business.components.business-form');
    }
}
