<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    public function index()
{
    $model = new ArtikelModel();

    $data = [
        'title' => 'Daftar Artikel',
        'artikel' => $model->getArtikelDenganKategori()
    ];

    return view('artikel/index', $data);
}

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where([
            'slug' => $slug
        ])->first();

        // Menampilkan error apabila data tidak ada.
        if (!$artikel)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $model = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';

        $builder = $model->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }

        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $data = [
            'title' => 'Daftar Artikel',
            'q' => $q,
            'kategori_id' => $kategori_id,
            'artikel' => $builder->paginate(5),
            'pager' => $model->pager,
            'kategori' => $kategoriModel->findAll(),
        ];

        return view('artikel/admin_index', $data);
    }

    public function add()
    {
        $model = new ArtikelModel();
        $kategoriModel = new \App\Models\KategoriModel();

        // validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'id_kategori' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid)
        {
            // 🔥 AMBIL FILE
            $file = $this->request->getFile('gambar');

            // 🔥 PATH LANGSUNG (TANPA MKDIR)
            $path = FCPATH . 'gambar/';

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $file->move($path);
                $namaGambar = $file->getName();
            } else {
                $namaGambar = null;
            }

            // 🔥 INSERT DATA
            $model->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'gambar' => $namaGambar,
            ]);

            return redirect()->to(base_url('admin/artikel'));
        }

        return view('artikel/form_add', [
            'title' => 'Tambah Artikel',
            'kategori' => $kategoriModel->findAll()
        ]);
    }

    public function edit($id)
    {
        $model = new ArtikelModel();
        $kategoriModel = new \App\Models\KategoriModel();

        // validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'id_kategori' => 'required|integer' // 🔥 tambahan
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid)
        {
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'id_kategori' => $this->request->getPost('id_kategori'), // 🔥 tambahan
            ]);

            return redirect()->to(base_url('admin/artikel'));
        }

        // ambil data lama
        $data = $model->where('id', $id)->first();

        $result = [
            'title' => 'Edit Artikel',
            'data' => $data,
            'kategori' => $kategoriModel->findAll(), // 🔥 WAJIB buat dropdown
        ];

        return view('artikel/form_edit', $result);
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);
        return redirect('admin/artikel');
    }
}