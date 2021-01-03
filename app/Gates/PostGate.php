<?php
namespace App\Gates;
class PostGate {
    public function allowed ($user,$id){
        return $user->id===$id;
    }
}
