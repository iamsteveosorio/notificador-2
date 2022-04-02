@extends('layouts.base')
@php use Illuminate\Support\Str; @endphp
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              {{Str::upper($user->name)}}
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
              <a href="{{ route('users') }}"
                class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                <span>
                  <i class="fa fa-arrow-left"></i>
                  <span>VOLVER</span>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        @if ($errors->any())
        <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('users.update',['id'=>$user->id]) }}" accept-charset="UTF-8"
          class="m-form m-form--label-align-left- m-form--state-" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include ('users.form', ['formMode' => 'edit'])
        </form>
      </div>
    </div>
    <!--end::Portlet-->
  </div>
</div>
@endsection
