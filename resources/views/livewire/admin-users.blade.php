<div>
    <div class="card">
        <div class="card-header bg-primary">
            Lista de usuarios con roles
        </div>
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre">
        </div>
        @if ($users->count())

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{$user->id}}
                                </td>

                                <td>
                                    {{$user->name}}
                                </td>

                                <td>
                                    {{$user->email}}
                                </td>

                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('rolusers.edit', $user)}}">Editar</a>
                                </td>

                            {{--  <td width="10px">
                                    <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                <td></td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else

            <div class="card-body">
                <strong>No hay registros...</strong>
            </div>

        @endif
    </div>
</div>
