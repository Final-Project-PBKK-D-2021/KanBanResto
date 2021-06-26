<?php


namespace App\Modules\KanBan\Core\Application\Service\Outlet\ListOutlet;


use JsonSerializable;

class ListOutletResponse implements JsonSerializable
{
    private string $nama_outlet;
    private string $alamat_outlet;
    private string $no_telepon_outlet;
    private string $business_id;

    /**
     * ListOutletResponse constructor.
     * @param string $nama_outlet
     * @param string $alamat_outlet
     * @param string $no_telepon_outlet
     * @param string $business_id
     */
    public function __construct(
        string $nama_outlet,
        string $alamat_outlet,
        string $no_telepon_outlet,
        string $business_id
    ) {
        $this->nama_outlet = $nama_outlet;
        $this->alamat_outlet = $alamat_outlet;
        $this->no_telepon_outlet = $no_telepon_outlet;
        $this->business_id = $business_id;
    }

    public function jsonSerialize(): array
    {
        return [
            'nama_outlet' => $this->nama_outlet,
            'alamat_outlet' => $this->alamat_outlet,
            'no_telepon_outlet' => $this->no_telepon_outlet,
            'business_id' => $this->business_id,
        ];
    }
}
