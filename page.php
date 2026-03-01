<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Halaman Contact',
            'content' => 'Ini adalah halaman Contact.'
        ]);
    }

    public function faqs()
    {
        return view('faqs', [
            'title' => 'Halaman FAQ',
            'content' => 'Ini adalah halaman FAQ.'
        ]);
    }

    public function tos()
    {
        return view('tos', [
            'title' => 'Halaman Terms of Service',
            'content' => 'Ini adalah halaman Terms of Service.'
        ]);
    }

    public function home()
    {
        return view('home', [
            'title' => 'Halaman Home',
            'content' => 'Selamat datang di website Praktikum Web 2.'
        ]);
    }
}