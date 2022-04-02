@php use Illuminate\Support\Str; @endphp
{{-- <input class="form-control" name="idCentroOperacion" type="hidden" id="idCentroOperacion" value="1" > --}}
<style>
  .m-separator.m-separator--lg {
    margin: 40px 0px;
  }
</style>

<input class="form-control" name="idCiudad" type="hidden" id="idCiudad" value="1">
<!-- datos del punto de venta en general -->
<div class="m-form__section">
  <div class="form-group row">
    <div class="col-md-4 {{ $errors->has('name') ? 'has-error' : ''}}">
      <label for="name" class="control-label">{{ 'NOMBRE' }}</label>
      <input class="form-control" name="name" type="text" id="name" style="text-transform:uppercase"
        value="{{ isset($user->name) ? $user->name : ''}}" required>
      {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4 {{ $errors->has('direccion') ? 'has-error' : ''}}">
      <label for="email" class="control-label">{{ 'CORREO' }}</label>
      <input class="form-control" name="email" type="text" style="text-transform:uppercase" id="email"
        value="{{ isset($user->email) ? $user->email : ''}}" required>
      {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4 {{ $errors->has('direccion') ? 'has-error' : ''}}">
      <label for="dni" class="control-label">{{ 'CEDULA' }}</label>
      <input class="form-control" name="dni" type="text" style="text-transform:uppercase" id="dni"
        value="{{ isset($user->dni) ? $user->dni : ''}}" required>
      {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="form-group row">
    {{-- <div class="col-md-4 {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'PASSWORD' }}</label>
    <input class="form-control" name="password" type="text" style="text-transform:uppercase" id="password"
      value="{{ isset($user->password) ? $user->password : ''}}" required>
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
  </div> --}}
  <div class="col-md-4 {{ $errors->has('role_id') ? 'has-error' : ''}}">
    <label for="role_id" class="control-label">{{ 'ROL' }}</label>
    <select name="role_id" id="role_id" class="form-control" required>
      <option value="">SELECCIONE UN ROL</option>
      @foreach ($roles as $r)
      @php $selected = isset($user->role_id) && $user->role_id == $r->id ? 'selected': '' @endphp
      <option value="{{$r->id}}" {{$selected}}>{{$r->name}}</option>
      @endforeach
    </select>
    {!! $errors->first('service_id', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="col-md-4 {{ $errors->has('personasPlanta') ? '' : ''}}">
    <label class="fcol-xl-3 col-md-12 col-form-label">ACTIVO ?</label>
    <div class="col-xl-9 col-lg-9">
      <div class="m-radio-inline">
        <label class="m-radio m-radio--solid m-radio--brand">
          @if(isset($user->active))
          <input type="radio" name="active" value="0" {{($user->active==0)?'checked':''}}> NO
          @else
          <input type="radio" name="active" value="0" {{'checked'}}> NO
          @endif
          <span></span>
        </label>
        <label class="m-radio m-radio--solid m-radio--brand">
          <input type="radio" name="active" value="1" {{(isset($user->active)&&$user->active==1)?'checked':''}}> SI
          <span></span>
        </label>
      </div>
    </div>
  </div>
</div>
</div>
<div class="m-separator m-separator--dashed m-separator--lg"></div>
<div class="m-form__actions">
  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR USUARIO' : 'CREAR' }}">
  </div>
</div>
