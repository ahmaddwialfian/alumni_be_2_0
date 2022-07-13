<?php

namespace Src\Alumni\Application\Contracts;

use Src\Alumni\Domain\Entities\Alumni;

interface AlumniServiceContract
{
    public function get($id);
	public function save(Alumni $alumni);
	public function delete($id);
}