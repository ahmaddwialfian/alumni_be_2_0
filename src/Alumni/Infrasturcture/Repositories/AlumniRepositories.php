<?php

namespace Src\Alumni\Infrasturcture\Repositories;

use App\Models\AlumniModel;
use Siakad\Repository;
use Src\Alumni\Domain\Contracts\AlumniRepositoryContract;
use Src\Alumni\Domain\Entities\Alumni;
use Src\Mahasiswa\Domain\ValueObjects\IdAlumni;

class AlumniRepositories implements AlumniRepositoryContract
{
    public function get(IdAlumni $id): Alumni
	{
		return Repository::get($id, AlumniModel::class, Alumni::class);
	}

	public function save(Alumni $alumni)
	{
		Repository::save($alumni, AlumniModel::class);
	}

	public function delete(IdAlumni $id)
	{
		Repository::delete($id, AlumniModel::class);
	}
}