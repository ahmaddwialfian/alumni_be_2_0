<?php

namespace Src\Alumni\Domain\Entities;

use Siakad\Domain\Entity;

class Alumni extends Entity
{
    protected int $id;
    protected string $nim;
    protected string $nama;
    protected string $email;
    protected string $alamat;
    protected string $tgl_lahir;
    protected string $no_telepon;
    protected string $nik;
    protected ?string $id_sso;

    public function getIdAlumni()
    {
        return $this->id;
    }
}
