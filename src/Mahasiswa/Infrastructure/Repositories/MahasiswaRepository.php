<?php

namespace Src\Mahasiswa\Infrastructure\Repositories;

use App\Models\MahasiswaModel;
use Siakad\Repository;
use Src\Mahasiswa\Domain\Contracts\MahasiswaRepositoryContract;
use Src\Mahasiswa\Domain\Entities\Mahasiswa;
use Src\Mahasiswa\Domain\ValueObjects\IdMahasiswa;

class MahasiswaRepository implements MahasiswaRepositoryContract
{
	public function get(IdMahasiswa $id): Mahasiswa
	{
		return Repository::get($id, MahasiswaModel::class, Mahasiswa::class);
	}

	public function save(Mahasiswa $mahasiswa)
	{
		Repository::save($mahasiswa, MahasiswaModel::class);
	}

	public function delete(IdMahasiswa $id)
	{
		Repository::delete($id, MahasiswaModel::class);
	}
}
