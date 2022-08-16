<?php
use App\Models\Estado;
    function estado($estado){
            return Estado::where('estado',$estado)->get()->first()->id;
    }
?>