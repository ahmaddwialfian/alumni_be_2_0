<?php

namespace Src\Mahasiswa\Application\Services;

use Siakad\Service;
use Src\Mahasiswa\Application\Contracts\MahasiswaServiceContract;
use Src\Mahasiswa\Domain\Contracts\MahasiswaRepositoryContract;
use Src\Mahasiswa\Domain\Entities\Mahasiswa;
use Src\Mahasiswa\Domain\ValueObjects\IdMahasiswa;

class MahasiswaService implements MahasiswaServiceContract
{
	protected MahasiswaRepositoryContract $repository;

	public function __construct(MahasiswaRepositoryContract $repository)
	{
		$this->repository = $repository;
	}

	public function get(IdMahasiswa $id): Mahasiswa
	{
		return Service::get($this->repository, $id);
	}

	public function save(Mahasiswa $mahasiswa)
	{
		Service::save($this->repository, $mahasiswa);
	}

	public function delete(IdMahasiswa $id)
	{
		Service::delete($this->repository, $id);
	}
}
