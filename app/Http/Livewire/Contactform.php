<?php

namespace App\Http\Livewire;
use App\Models\Message;
use Livewire\Component;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;

class Contactform extends Component
{
    public $name;
    public $email;
    public $message;
    public $subject;
    public $successMessage;
    public $rules = [
        'name'=>'required',
        'email'=>'required|email',
        'subject'=>'required',
        'message'=>'required|min:6'
    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName); 
    }
    public function submitform(){
        $contact = $this->validate();
   
        $this->resetForm();
    }
    private function resetForm(){
        $this->name="";
        $this->email="";
        $this->subject="";
        $this->message="";
    }
    public function render()
    {
        return view('livewire.contactform');
    }
}
