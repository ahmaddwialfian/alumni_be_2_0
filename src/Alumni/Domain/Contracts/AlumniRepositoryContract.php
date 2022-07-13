<?php

namespace Src\Alumni\Domain\Contracts;

use Src\Alumni\Domain\Entities\Alumni;

interface AlumniRepositoryContract
{
    public function get($id);
    public function save(Alumni $alumni);
    public function delete($id);
}