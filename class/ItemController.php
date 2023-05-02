<?php

class ItemController
{
    public function ajax()
    {
        $db = new \database\Database();
        $item = $db->select("SELECT * FROM items")->fetchAll();
        view('get-data-ajax', compact('item'));
    }

    public function index()
    {
        view('ajaxfildes');
    }

    public function create($req)
    {
        dd($req);
        return 1;
    }

    public function update($req)
    {

    }

    public function delete($req)
    {

    }
}