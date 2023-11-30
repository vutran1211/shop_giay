<?php

class News extends Controller
{

    public function index()
    {
        $this->view("client", [
            'page' => 'news',
            'title' => 'Tin tức',
            'css' => ['base', 'main'],
            'js' => ['main'],

        ]);
    }
}
