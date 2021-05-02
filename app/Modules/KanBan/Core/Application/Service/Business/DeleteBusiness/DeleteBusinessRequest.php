<?php


namespace App\Modules\KanBan\Core\Application\Service\Business\DeleteBusiness;


class DeleteBusinessRequest
{
    private int $id;

    /**
     * DeleteBusinessRequest constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}
