<?php

namespace Src\Alumni\Domain\Contracts;

use Src\Alumni\Domain\Entities\Alumni;
use Src\Mahasiswa\Domain\ValueObjects\IdAlumni;

interface AlumniRepositoryContract
{
	public function get(IdAlumni $id): Alumni;
    public function save(Alumni $alumni);
    public function delete(IdAlumni $id);
}