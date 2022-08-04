<?php

namespace Src\Mahasiswa\Application\Contracts;

use Src\Mahasiswa\Domain\Entities\Mahasiswa;
use Src\Mahasiswa\Domain\ValueObjects\IdMahasiswa;

interface MahasiswaServiceContract
{
	public function get(IdMahasiswa $id): Mahasiswa;
	public function save(Mahasiswa $mahasiswa);
	public function delete(IdMahasiswa $id);
}
