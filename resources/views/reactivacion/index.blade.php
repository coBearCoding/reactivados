@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="home">
            <img src="{{ asset('images/logo-reactivacion.png') }}" alt="" class="logo-reactivacion" />
            <p>
                Ingresa con tu número de cédula para seleccionar el subsidio al que
                deseas acogerte en tu matrícula
            </p>
            <form id="loginForm" method="POST" action="login">
                @csrf
            <input type="text" id="cedula" id="cedula" name="cedula" placeholder="Cedula"/>
                <button type="submit" class="btn btn-secondary btn-rounded">Ingresar</button>
            <form>
        </div>
    </div>


@include('reactivacion.modals.index.modal_cedula_incorrecta')
@include('reactivacion.modals.index.modal_error')
@include('reactivacion.modals.index.modal_plan_elegido')

@endsection
