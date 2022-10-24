<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationComponent extends Component
{
    public $notifications, $count;

    public function mount(){
        // if(Auth::check()){
        //     //return redirect()->route('login');
        //     $this->count = 1;
        // }else{
            
        //     return redirect()->route('login');
        
        if(isset(auth()->user()->unreadNotifications))
        {
            $this->count = auth()->user()->unreadNotifications->count();
            $this->notifications = auth()->user()->notifications;
        }
    }

    public function render()
    {
        return view('livewire.notification-component');
    }

    /* public function resetNotificationCount(){
        auth()->user()->notification = 0;
        auth()->user()->save();
    } */
}
