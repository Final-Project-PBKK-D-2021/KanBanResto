<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu;


class DeleteMenuRequest
{
    private int $id;

    /**
     * DeleteMenuRequest constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getMenuId(): int
    {
        return $this->id;
    }
}

