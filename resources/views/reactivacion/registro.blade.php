@extends('layouts.app')

@section('content')
<div class="container">
    <img
      class="logo-reactivacion"
      src="{{asset('images/logo-reactivacion.png')}}"
      alt="logo reactivacion"
    />
    <div id="planRetornov2">
      <div class="retorno-info_v2">
        <div>
          <img src="{{asset('images/image-01.png')}}" alt="" />
        </div>
        <div>
          <img src="{{asset('images/image-02.png')}}" alt="" />
          <a onclick="confirmaVirtual()" class="sub30"></a>
          <a onclick="getPresencial()" class="sub60"></a>
        </div>
      </div>
    </div>
</div>


@include('reactivacion.modals.registro.modal_plan_confirm')
@include('reactivacion.modals.registro.modal_plan_virtual_suceess')
@include('reactivacion.modals.registro.modal_presencial_sucess')
@include('reactivacion.modals.registro.modal_registro')
@include('reactivacion.modals.registro.modal_terms')
@include('reactivacion.modals.index.modal_error')

@endsection
