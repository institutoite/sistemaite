<table class="table table-light">
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
                    <button wire:click="editar({{$carrera->id}})" class="btn btn-primary">
                        Editar
                    </button>
                    <button wire:click="delete({{ $carrera->id }})" class="btn btn-danger">
                        Eliminar
                    </button>
                </td>
            </tr>
        @endforeach
        
    </tbody>
    
</table>
{{ $carreras->links() }}