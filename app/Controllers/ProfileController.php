<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('front/head_view')
            . view('front/navbar_view')
            . view('front/profile')
            . view('front/footer_view');
    }
}
