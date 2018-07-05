<?php
namespace App\Repositories\Contact;

use App\Infrastructure\Eloquent\Contact\Contact;

interface ContactRepositoryInterface{
   
    public function all();
    public function find($id);
    public function sendMessage(Contact $contact);
    public function newInstanceEmpty();
}