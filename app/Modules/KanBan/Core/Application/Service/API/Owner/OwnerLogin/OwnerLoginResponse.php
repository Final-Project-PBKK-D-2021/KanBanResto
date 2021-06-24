<?php


namespace App\Modules\KanBan\Core\Application\Service\API\Owner\OwnerLogin;


use JsonSerializable;

class OwnerLoginResponse implements JsonSerializable
{
    private string $token;

    /**
     * OwnerLoginResponse constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function jsonSerialize(): array
    {
        return [
            'token' => $this->token
        ];
    }
}
