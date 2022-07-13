<?php

namespace Src\Alumni\Application\Services;

use Src\Alumni\Application\Contracts\AlumniServiceContract;
use Src\Alumni\Domain\Contracts\AlumniRepositoryContract;
use Src\Alumni\Domain\Entities\Alumni;

class AlumniService implements AlumniServiceContract
{
    protected AlumniRepositoryContract $alumniRepository;

    public function __construct(AlumniRepositoryContract $alumniRepository)
    {
        $this->alumniRepository = $alumniRepository;
    }

    public function get($id)
    {
        //
    }
    
    public function save(Alumni $alumni)
    {
        //
    }
    
    public function delete($id)
    {
        //
    }
}