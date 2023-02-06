@extends('layouts.app')

@section('content')
<div class="container">
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar Cliente') }}</div>
                    <div class="card-body">
                        <form action="{{url('/clientes/'. $cliente->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            @include('clientes.form', ['modo'=>'edit'])
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection