<?php

namespace App\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return $this->view('contacts.index');
    }

    public function create()
    {
        return 'Aquí se mostrará el formulario para crear un contacto';
    }

    public function store()
    {
        return 'Aquí se procesará el formulario para crear un contacto';
    }

    public function show($id)
    {
        return 'Aquí se mostrará el contacto con id: ' . $id;
    }

    public function edit($id)
    {
        return 'Aquí se mostrará el formulario para editar el contacto con id: ' . $id;
    }

    public function update($id)
    {
        return 'Aquí se procesará el formulario para editar el contacto con id: ' . $id;
    }

    public function delete($id)
    {
        return "Aquí se procesará la petición para eliminar el contacto con id: " . $id;
    }

}