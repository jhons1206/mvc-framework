<?php

namespace App\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $model = new Contact;

        $model->where('id', '>=', 2)
            ->where('id', '<=', 10)
            ->orderBy('id')
            ->paginate(3);
    
        if(isset($_GET['search'])) {
            $contacts = $model->where('name', 'LIKE' , '%' . $_GET['search'] . '%')->paginate(3);
        } else {
            $contacts = $model->paginate(3);
        }
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