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
    <div class="col-md-4 {{ $errors->has('campaing_type_id') ? 'has-error' : ''}}">
      <label for="campaing_type_id" class="control-label">{{ 'TIPO DE CAMPANA' }}</label>
      <select name="campaing_type_id" id="campaing_type_id" class="form-control" required>
        <option value="">SELECCIONE UN TIPO CAMPAÑA</option>
        @foreach ($types as $s)
        @php $selected = isset($campaing->campaing_type_id) && $campaing->campaing_type_id == $s->id ? 'selected': ''
        @endphp
        <option value="{{$s->id}}" {{$selected}}>{{$s->name}}</option>
        @endforeach
      </select>
      {!! $errors->first('campaing_type_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4 {{ $errors->has('name') ? 'has-error' : ''}}">
      <label for="name" class="control-label">{{ 'NOMBRE' }}</label>
      <input class="form-control" name="name" type="text" id="name" style="text-transform:uppercase"
        value="{{ isset($campaing->name) ? $campaing->name : ''}}" required>
      {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4 {{ $errors->has('callzi_id') ? 'has-error' : ''}}">
      <label for="callzi_id" class="control-label">{{ 'CALLZI ID' }}</label>
      <input class="form-control" name="callzi_id" type="text" style="text-transform:uppercase" id="callzi_id"
        value="{{ isset($campaing->callzi_id) ? $campaing->callzi_id : ''}}" required>
      {!! $errors->first('callzi_id', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>
<div class="m-separator m-separator--dashed m-separator--lg"></div>
<div class="m-form__actions">
  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR CAMPANA' : 'CREAR' }}">
  </div>
</div>
