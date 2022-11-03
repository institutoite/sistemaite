<?php
  /*%%%%%%%%%%%%%%%%%%%%%%%%%  mustra cantidad de inscripciones por modalidad */
  $pagos = Inscripcione::join('modalidads','inscripciones.modalidad_id','modalidads.id')
    ->select('modalidad',DB::raw('count(*) as cantidad'))
    ->groupBy('modalidad')
    ->get();

    /*%%%%%%%%%%%%%%%%%%%%%%%%%   cantidad de dinero recaudado por modalides */
    $o = Inscripcione::join('modalidads','inscripciones.modalidad_id','modalidads.id')
    ->join('pagos','pagos.pagable_id','inscripciones.id')
    ->where('pagos.pagable_type','App\\Models\\Inscripcione')
    ->select('modalidad',DB::raw('sum(monto) as monto'))
    ->groupBy('modalidad')
    ->get();
    
    
    /*%%%%%%%%%%%%%%%%%%%%%%%%% mustra las cantidad de inscripciones que hicieron cada usuario */
    $s= Inscripcione::join('userables','userables.userable_id','inscripciones.id')
    ->join('users','users.id','userables.user_id')
      ->where('userables.userable_type', "App\\Models\\Inscripcione")
      ->select('users.name',DB::raw('count(*) as cantidad'))
      ->groupBy('name')
      ->get();
      
      /*%%%%%%%%%%%%%%%%%%%%%%%%% mustra las cantidad de dinero recaudado de pagos sobre inscripciones por usuario*/
      $s= Inscripcione::join('pagos','pagos.pagable_id','inscripciones.id')
      ->join('userables','userables.userable_id','pagos.id')
        ->join('users','users.id','userables.user_id')
        ->where('userables.userable_type', "App\\Models\\Pago")
        ->where('pagos.pagable_type', "App\\Models\\Inscripcione")
        ->select('users.name',DB::raw('sum(monto) as suma'))
        ->groupBy('name')
        ->get();
        
      /*%%%%%%%%%%%%%%%%%%%%%%%%% mustra las cantidad de pagos realizados sobre inscripciones por usuario*/
        $s= Inscripcione::join('pagos','pagos.pagable_id','inscripciones.id')
          ->join('userables','userables.userable_id','pagos.id')
          ->join('users','users.id','userables.user_id')
          ->where('userables.userable_type', "App\\Models\\Pago")
          ->where('pagos.pagable_type', "App\\Models\\Inscripcione")
          ->select('users.name',DB::raw('count(*) as cantidad'))
          ->groupBy('name')
          ->get();