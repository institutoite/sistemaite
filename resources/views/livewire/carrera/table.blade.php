<table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>carrera</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carreras as $carrera)
            <tr>
                <td>{{$carrera->id}}</td>
                <td>{{$carrera->carrera}}</td>
                <td>
                    <a wire:click="editar({{$carrera->id}})" class="">
                        <i class="fa fa-fw fa-edit text-primary"></i>
                    </a>
                    <a wire:click="show({{$carrera->id}})" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta persona">
                        <i class="fa fa-fw fa-eye text-primary"></i>
                    </a>
                    <a wire:click="delete({{ $carrera->id }})">
                        <i class="fa fa-fw fa-trash text-danger"></i>   
                    </a>
                </td>
            </tr>
        @endforeach
        
    </tbody>
    
</table>
{{ $carreras->links() }}



