<?php


namespace App\Modules\KanBan\Core\Application\Service\Business\GetBusiness;


class GetBusinessRequest
{
    private int $id;

    /**
     * GetBusinessRequest constructor.
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
