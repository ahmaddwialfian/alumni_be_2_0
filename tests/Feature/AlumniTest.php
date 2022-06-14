<?php

namespace Tests\Feature;

use App\Models\Alumni;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumniTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_lihat_semua_data_alumni()
    {
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];
        Alumni::create($dataAlumni);

        $response = $this->get('/alumni');

        $this->assertDatabaseHas('alumnis', $dataAlumni);

    }

    public function test_menambah_data_alumni()
    {
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];

        $response = $this->post('/alumni', $dataAlumni);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('alumnis', $dataAlumni);
    }

    public function test_mengubah_data_alumni()
    {
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];
        $alumni = Alumni::create($dataAlumni);

        $dataAlumni['nama'] = 'Andry';

        $response = $this->patch('/alumni/' . $alumni->id, $dataAlumni);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('alumnis', $dataAlumni);
    }

    public function test_menghapus_data_alumni()
    {
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];
        $alumni = Alumni::create($dataAlumni);

        $response = $this->delete('/alumni/' . $alumni->id);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('alumnis', $dataAlumni);
    }
}
