<?php

namespace App\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $model = new Contact;
        $contacts = $model->paginate(4);

        // return $contacts;

        // compact("contacts") => ["contacts" => $contacts]
        return $this->view("contacts.index", compact("contacts"));
    }

    public function create()
    {
        return $this->view("contacts.create");
    }

    public function store()
    {
        // Retornar parámetros del formulario
        $data = $_POST;
        $model = new Contact;
        $model->create($data);
        $this->redirect("/contacts");
    }

    public function show($id)
    {
        $model = new Contact;
        $contact = $model->find($id);

        return $this->view("contacts.show", compact("contact"));
    }

    public function edit($id)
    
    {
        $model = new Contact;
        $contact = $model->find($id);

        return $this->view("contacts.edit", compact("contact"));
    }

    public function update($id)
    {
        $data = $_POST;
        $model = new Contact;
        $model->update($id, $data);
        $this->redirect("/contacts/{$id}");
    }

    public function delete($id)
    {
        $model = new Contact;
        $model->delete($id);

        $this->redirect("/contacts");

    }

}