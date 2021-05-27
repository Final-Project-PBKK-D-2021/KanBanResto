<?php


namespace App\Modules\KanBan\Core\Application\Service\Business\CreateBusiness;


class CreateBusinessRequest
{
    private string $name;
    private string $description;
    private int $since;
    private string $owner_name;

    /**
     * CreateBusinessRequest constructor.
     * @param string $name
     * @param string $description
     * @param int $since
     * @param string $owner_name
     */
    public function __construct(string $name, string $description, int $since, string $owner_name)
    {
        $this->name = $name;
        $this->description = $description;
        $this->since = $since;
        $this->owner_name = $owner_name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getSince(): int
    {
        return $this->since;
    }

    /**
     * @return string
     */
    public function getOwnerName(): string
    {
        return $this->owner_name;
    }
}