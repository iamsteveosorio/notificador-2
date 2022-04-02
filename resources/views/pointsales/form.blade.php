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
    <div class="col-md-3 {{ $errors->has('name') ? 'has-error' : ''}}">
      <label for="name" class="control-label">{{ 'NOMBRE' }}</label>
      <input class="form-control" name="name" type="text" id="name" style="text-transform:uppercase"
        value="{{ isset($point->name) ? $point->name : ''}}" required>
      {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-3 {{ $errors->has('direccion') ? 'has-error' : ''}}">
      <label for="address" class="control-label">{{ 'DIRECCION' }}</label>
      <input class="form-control" name="address" type="text" style="text-transform:uppercase" id="address"
        value="{{ isset($point->address) ? $point->address : ''}}" required>
      {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-2 {{ $errors->has('city') ? 'has-error' : ''}}">
      <label for="city" class="control-label">{{ 'CIUDAD' }}</label>
      <input class="form-control" name="city" type="text" style="text-transform:uppercase" id="city"
        value="{{ isset($point->city) ? $point->city : ''}}" required>
      {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-2 {{ $errors->has('service_id') ? 'has-error' : ''}}">
      <label for="service_id" class="control-label">{{ 'TIPO DE SERVICIO' }}</label>
      <select name="service_id" id="service_id" class="form-control" required>
        <option value="">SELECCIONE UN TIPO DE SERVICIO</option>
        @foreach ($services as $s)
        @php $selected = isset($point->service_id) && $point->service_id == $s->id ? 'selected': '' @endphp
        <option value="{{$s->id}}" {{$selected}}>{{$s->name}}</option>
        @endforeach
      </select>
      {!! $errors->first('service_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-2 {{ $errors->has('mtsCuadrados') ? 'has-error' : ''}}">
      <label for="restaurant_id" class="control-label">{{ 'TIPO DE RESTAURANTE' }}</label>
      <select name="restaurant_id" id="restaurant_id" class="form-control" required>
        <option value="">SELECCIONE UN TIPO DE RESTAURANTE</option>
        @foreach ($restaurants as $r)
        @php $selected = isset($point->restaurant_id) && $point->restaurant_id == $r->id ? 'selected': '' @endphp
        <option value="{{$r->id}}" {{$selected}}>{{$r->name}}</option>
        @endforeach
      </select>
      {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-3 {{ $errors->has('personasPlanta') ? 'SERVICIO AL CLIENTE' : ''}}">
      <label class="fcol-xl-3 col-md-12 col-form-label">SERVICIO AL CLIENTE?</label>
      <div class="col-xl-9 col-lg-9">
        <div class="m-radio-inline">
          <label class="m-radio m-radio--solid m-radio--brand">
            @if(isset($point->costumer_service))
            <input type="radio" name="costumer_service" value="0" {{($point->costumer_service==0)?'checked':''}}> NO
            @else
            <input type="radio" name="costumer_service" value="0" {{'checked'}}> NO
            @endif
            <span></span>
          </label>
          <label class="m-radio m-radio--solid m-radio--brand">
            <input type="radio" name="costumer_service" value="1"
              {{(isset($point->costumer_service)&&$point->costumer_service==1)?'checked':''}}> SI
            <span></span>
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-3 {{ $errors->has('personasTemporadaAlta') ? 'has-error' : ''}}">
      <label class="fcol-xl-3 col-md-12 col-form-label">SERVICIO A DOMICILIO PROPIO?</label>
      <div class="col-xl-9 col-lg-9">
        <div class="m-radio-inline">
          <label class="m-radio m-radio--solid m-radio--brand">
            @if(isset($point->costumer_service))
            <input type="radio" name="owner_delivery" value="0" {{($point->owner_delivery==0)?'checked':''}}> NO
            @else
            <input type="radio" name="owner_delivery" value="0" {{'checked'}}> NO
            @endif
            <span></span>
          </label>
          <label class="m-radio m-radio--solid m-radio--brand">
            <input type="radio" name="owner_delivery" value="1"
              {{(isset($point->owner_delivery)&&$point->owner_delivery==1)?'checked':''}}> SI
            <span></span>
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-3 {{ $errors->has('promedioVentas') ? 'has-error' : ''}}">
      <label class="fcol-xl-3 col-md-12 col-form-label">SERVICIO A DOMICILIO CON PLATAFORMAS?</label>
      <div class="col-xl-9 col-lg-9">
        <div class="m-radio-inline">
          <label class="m-radio m-radio--solid m-radio--brand">
            @if(isset($point->costumer_service))
            <input type="radio" name="platform_delivery" value="0" {{($point->platform_delivery==0)?'checked':''}}> NO
            @else
            <input type="radio" name="platform_delivery" value="0" {{'checked'}}> NO
            @endif
            <span></span>
          </label>
          <label class="m-radio m-radio--solid m-radio--brand">
            <input type="radio" name="platform_delivery" value="1"
              {{(isset($point->platform_delivery)&&$point->platform_delivery==1)?'checked':''}}> SI
            <span></span>
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-3 {{ $errors->has('promedioVentas') ? 'has-error' : ''}}">
      <label class="fcol-xl-3 col-md-12 col-form-label">VENTA DE DESAYUNO?</label>
      <div class="col-xl-9 col-lg-9">
        <div class="m-radio-inline">
          <label class="m-radio m-radio--solid m-radio--brand">
            @if(isset($point->costumer_service))
            <input type="radio" name="breakfast_sale" value="0" {{($point->breakfast_sale==0)?'checked':''}}> NO
            @else
            <input type="radio" name="breakfast_sale" value="0" {{'checked'}}> NO
            @endif
            <span></span>
          </label>
          <label class="m-radio m-radio--solid m-radio--brand">
            <input type="radio" name="breakfast_sale" value="1"
              {{(isset($point->breakfast_sale)&&$point->breakfast_sale==1)?'checked':''}}> SI
            <span></span>
          </label>
        </div>
      </div>
    </div>
  </div>
</div>
@if($formMode === 'edit')
<div class="m-form__seperator m-form__seperator--dashed"></div>
<div class="m-form__section">
  <div class="m-form__heading">
    <h3 class="m-form__heading-title m--font-warning">CAMPAÑAS</h3>
    <p></p>
  </div>
  <div class="form-group  m-form__group row">
    <div class="col-md-6 {{ $errors->has('') ? 'has-error' : ''}}">
      <label for="turnero" class="control-label">{{ 'CAMPAÑA TURNERO' }}</label>
      <select name="turnero" id="turnero" class="form-control">
        <option value="">SELECCIONE CAMPAÑA TURNERO</option>
        @foreach ($turneros as $r)
        @php $selected = $point->turnero() && $point->turnero()->campaing_id == $r->id ? 'selected': '' @endphp
        <option value="{{$r->id}}" {{$selected}}>{{$r->name}}</option>
        @endforeach
      </select>
      {!! $errors->first('turnero', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 {{ $errors->has('') ? 'has-error' : ''}}">
      <label for="despacho" class="control-label">{{ 'CAMPAÑA DESPACHO' }}</label>
      <select name="despacho" id="despacho" class="form-control">
        <option value="">SELECCIONE CAMPAÑA DESPACHO</option>
        @foreach ($despachos as $r)
        @php $selected = $point->despacho() && $point->despacho()->campaing_id == $r->id ? 'selected': '' @endphp
        <option value="{{$r->id}}" {{$selected}}>{{$r->name}}</option>
        @endforeach
      </select>
      {!! $errors->first('despacho', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="form-group  m-form__group row pl-4">
    <label for="turnero" class="control-label">{{ 'CAMPAÑAS FEEDBACK' }}</label>
    <div id="m_repeater_1" class="col-md-12">
      <div class="form-group  m-form__group row" id="m_repeater_1">
        <div data-repeater-list="feedbacks" class="col-lg-12">
          @if(count($point->feedbacks()))
          @foreach ($point->feedbacks() as $feedback)
          <div data-repeater-item="feedback" class="form-group m-form__group row align-items-center" style="">
            <div class="col-md-6">
              <div class="m-form__group m-form__group--inline">
                <div class="m-form__label">
                </div>
                <div class="m-form__control">
                  <select name="feedback" class="form-control m-input">
                    <option value="">SELECCIONE UNA CAMPAÑA FEEDBACK</option>
                    @foreach($feedbacks as $f)
                    @php $selected = ($feedback->campaing_id === $f->id)?'selected':'' @endphp
                    <option value="{{$f->id}}" {{$selected}}>{{Str::upper($f->name)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="d-md-none m--margin-bottom-10"></div>
            </div>
            <div class="col-md-4">
              <div data-repeater-delete="" class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                <span>
                  <i class="la la-trash-o"></i>
                  <span>BORRAR</span>
                </span>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div data-repeater-item="feedback" class="form-group m-form__group row align-items-center" style="">
            <div class="col-md-6">
              <div class="m-form__group m-form__group--inline">
                <div class="m-form__label">
                </div>
                <div class="m-form__control">
                  <select name="feedback" class="form-control m-input">
                    <option value="">SELECCIONE UNA CAMPAÑA FEEDBACK</option>
                    @foreach($feedbacks as $f)
                    <option value="{{$f->id}}">{{Str::upper($f->name)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="d-md-none m--margin-bottom-10"></div>
            </div>
            <div class="col-md-4">
              <div data-repeater-delete="" class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                <span>
                  <i class="la la-trash-o"></i>
                  <span>BORRAR</span>
                </span>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="m-form__group form-group row">
        <label class="col-lg-2 col-form-label"></label>
        <div class="col-lg-4">
          <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
            <span>
              <i class="la la-plus"></i>
              <span>AGREGAR</span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="m-form__seperator m-form__seperator--dashed"></div>
<div class="m-form__section">
  <div class="m-form__heading">
    <h3 class="m-form__heading-title m--font-warning">USUARIOS</h3>
    <p></p>
  </div>
  <div class="form-group  m-form__group row pl-4">
    <label for="turnero" class="control-label">{{ 'ADMINISTRADORES' }}</label>
    <div id="m_repeater_2" class="col-md-12">
      <div class="form-group  m-form__group row" id="m_repeater_2">
        <div data-repeater-list="users" class="col-lg-12">
          @if($point->total_users)
          @foreach ($point->point_sale_users as $user)
          <div data-repeater-item="feedback" class="form-group m-form__group row align-items-center" style="">
            <div class="col-md-6">
              <div class="m-form__group m-form__group--inline">
                <div class="m-form__label">
                </div>
                <div class="m-form__control">
                  <select name="user" class="form-control m-input">
                    <option value="">SELECCIONE UN USUARIO</option>
                    @foreach($users as $u)
                    @php $selected = ($user->user_id === $u->id)?'selected':'' @endphp
                    <option value="{{$u->id}}" {{$selected}}>{{Str::upper($u->name)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="d-md-none m--margin-bottom-10"></div>
            </div>
            <div class="col-md-4">
              <div data-repeater-delete="" class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                <span>
                  <i class="la la-trash-o"></i>
                  <span>BORRAR</span>
                </span>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div data-repeater-item="user" class="form-group m-form__group row align-items-center" style="">
            <div class="col-md-6">
              <div class="m-form__group m-form__group--inline">
                <div class="m-form__label">
                </div>
                <div class="m-form__control">
                  <select name="user" class="form-control m-input">
                    <option value="">SELECCIONE UN USUARIO</option>
                    @foreach($users as $u)
                    <option value="{{$u->id}}">{{Str::upper($u->name)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="d-md-none m--margin-bottom-10"></div>
            </div>
            <div class="col-md-4">
              <div data-repeater-delete="" class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                <span>
                  <i class="la la-trash-o"></i>
                  <span>BORRAR</span>
                </span>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="m-form__group form-group row">
        <label class="col-lg-2 col-form-label"></label>
        <div class="col-lg-4">
          <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
            <span>
              <i class="la la-plus"></i>
              <span>AGREGAR</span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
<div class="m-separator m-separator--dashed m-separator--lg"></div>
<div class="m-form__actions">
  <div class="form-group">
    <input class="btn btn-primary" type="submit"
      value="{{ $formMode === 'edit' ? 'ACTUALIZAR PUNTO DE VENTA' : 'CREAR' }}">
  </div>
</div>
