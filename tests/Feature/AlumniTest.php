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
        //payload
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];

        //tambah alumni baru
        Alumni::create($dataAlumni);

        //get endpoint lihat semua alumni
        $response = $this->get('/alumni');

        //cek response status code
        $response->assertStatus(200);

        //cek apakah return view benar
        $response->assertViewIs('alumni.index');

        //cek apakah return data benar
        $response->assertViewHas('alumnis', Alumni::all());

        //cek apakah data ada di db
        $this->assertDatabaseHas('alumnis', $dataAlumni);
    }

    public function test_bisa_mengakses_halaman_tambah_alumni()
    {
        //cek apakah bisa mengakses halaman tambah alumni
        $response = $this->get('/alumni/create');

        //cek response status code
        $response->assertStatus(200);

        //cek apakah return view benar
        $response->assertViewIs('alumni.create');
    }

    public function test_menambah_data_alumni()
    {
        //payload
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];

        //post endpoint alumni
        $response = $this->post('/alumni', $dataAlumni);

        //cek session tidak ada errors
        $response->assertSessionHasNoErrors();

        //cek response status code
        $response->assertStatus(302);

        $response->assertSessionHas('success', 'Data alumni berhasil ditambahkan');

        //cek apakah sudah diredirect ke halaman alumni
        $response->assertRedirect('/alumni');

        //cek apakah data ada di db
        $this->assertDatabaseHas('alumnis', $dataAlumni);
    }

    public function test_mengakses_halaman_edit_alumni()
    {
        //payload
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];

        //tambah alumni baru
        $alumniBaru = Alumni::create($dataAlumni);

        //get endpoint edit alumni
        $response = $this->get('/alumni/' . $alumniBaru->id . '/edit');

        //cek response status code
        $response->assertStatus(200);

        //cek apakah return view benar
        $response->assertViewIs('alumni.edit');

        //cek apakah return data benar
        $response->assertViewHas('alumni', $alumniBaru);

        //cek apakah data ada di db
        $this->assertDatabaseHas('alumnis', $dataAlumni);
    }

    public function test_mengubah_data_alumni()
    {
        //payload
        $dataAlumni = [
            'nim' => '0987654321',
            'nama' => 'Alfian',
            'email' => 'alfian@alfin.com',
            'alamat' => 'sini',
            'tgl_lahir' => '1999-01-01',
            'no_telepon' => '0987654321',
            'nik' => '0987654321',
        ];

        //tambah alumni baru
        $alumni = Alumni::create($dataAlumni);

        //ubah data alumni
        $dataAlumni['nama'] = 'Andry';

        //patch endpoint update alumni
        $response = $this->patch('/alumni/' . $alumni->id . '/edit', $dataAlumni);

        //cek session tidak ada errors
        $response->assertSessionHasNoErrors();

        //cek response status code
        $response->assertStatus(302);

        $response->assertSessionHas('success', 'Data alumni berhasil diubah');

        //cek apakah sudah diredirect ke halaman alumni
        $response->assertRedirect('/alumni');

        //cek apakah data ada di db
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
