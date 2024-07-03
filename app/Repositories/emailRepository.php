<?php

namespace App\Repositories;
use App\Models\MailToContact;
use App\Interfaces\emailRepositoryInterface;
class emailRepository implements emailRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function index(){
        return MailToContact::all();
    }

    public function getById($id){
       return MailToContact::findOrFail($id);
    }

    public function sendMailToContect(array $data){
       return MailToContact::create($data);
    }

    public function update(array $data,$id){
       return MailToContact::whereId($id)->update($data);
    }
    
    public function delete($id){
       MailToContact::destroy($id);
    }
}
