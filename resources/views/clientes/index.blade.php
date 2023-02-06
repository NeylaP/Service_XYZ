@extends('layouts.app')

@section('content')
<script src="https://kit.fontawesome.com/5be4e7229b.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        @if (session('mensaje'))
            <div class="alert alert-success" role="alert">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="col-md-10">
        <a href="{{url('/clientes/create')}}">Nuevo Cliente</a><br><br>
            <div class="card">
                <div class="card-header">{{ __('Clientes') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>N°</th>
                                <th></th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img class="img-thumbnail" src="{{asset('storage').'/'.$cliente->imagen}}" alt=""></td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->cedula}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->observaciones}}</td>
                                <td>
                                    <a href="{{url('/clientes/'.$cliente->id.'/detalle')}}">Detalle</a>
                                    <a href="{{url('/clientes/'.$cliente->id.'/edit')}}">Editar</a>
                                    <form method="post" action="{{url('/clientes/'.$cliente->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('¿Desea borrar este registro?');">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection