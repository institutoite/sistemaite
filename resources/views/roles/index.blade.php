@extends('adminlte::page')

@section('title', 'roles')

@section('content_header')
    <h1 class="text-center text-primary">Lista de Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de roles<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('role.create')}}">Nuevo Rol</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{$role->id}}
                            </td>

                            <td>
                                {{$role->name}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('role.edit', $role)}}">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            <td></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
