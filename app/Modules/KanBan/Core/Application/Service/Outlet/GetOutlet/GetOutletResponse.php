<?php


namespace App\Modules\KanBan\Core\Application\Service\Outlet\GetOutlet;


use JsonSerializable;

class GetOutletResponse implements JsonSerializable
{
    private int $id;
    private string $nama_outlet;
    private string $alamat_outlet;
    private string $no_telepon_outlet;
    private string $business_id;

    /**
     * ListOutletResponse constructor.
     * @param int $id
     * @param string $nama_outlet
     * @param string $alamat_outlet
     * @param string $no_telepon_outlet
     * @param string $business_id
     */
    public function __construct(
        int $id,
        string $nama_outlet,
        string $alamat_outlet,
        string $no_telepon_outlet,
        string $business_id
    ) {
        $this->id = $id;
        $this->nama_outlet = $nama_outlet;
        $this->alamat_outlet = $alamat_outlet;
        $this->no_telepon_outlet = $no_telepon_outlet;
        $this->business_id = $business_id;
    }

    /**
     * @return int
     */
    public function getOutletId(): int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getNamaOutlet(): string
    {
        return $this->nama_outlet;
    }

    /**
     * @return string
     */
    public function getAlamatOutlet(): string
    {
        return $this->alamat_outlet;
    }

    /**
     * @return string
     */
    public function getNoTelpOutlet(): string
    {
        return $this->no_telepon_outlet;
    }

     /**
     * @return int
     */
    public function getBusinessId(): int
    {
        return $this->business_id;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'nama_outlet' => $this->nama_outlet,
            'alamat_outlet' => $this->alamat_outlet,
            'no_telepon_outlet' => $this->no_telepon_outlet,
            'business_id' => $this->business_id,
        ];
    }
}