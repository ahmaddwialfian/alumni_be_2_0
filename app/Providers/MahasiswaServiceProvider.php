<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Src\Mahasiswa\Application\Contracts\MahasiswaServiceContract;
use Src\Mahasiswa\Application\Services\MahasiswaService;
use Src\Mahasiswa\Domain\Contracts\MahasiswaRepositoryContract;
use Src\Mahasiswa\Infrastructure\Repositories\MahasiswaRepository;

class MahasiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
	public $bindings = [
		MahasiswaRepositoryContract::class => MahasiswaRepository::class,
		MahasiswaServiceContract::class => MahasiswaService::class
	];

	public function provides()
	{
		return [
			MahasiswaRepositoryContract::class,
			MahasiswaServiceContract::class
		];
	}
}
