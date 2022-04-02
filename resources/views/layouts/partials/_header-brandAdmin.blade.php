<!-- BEGIN: Brand -->
<div class="m-stack__item m-brand m-brand--skin-dark ">
	<div class="m-stack m-stack--ver m-stack--general">
		<div class="m-stack__item m-stack__item--middle m-brand__logo">
            <a href="{{Auth::user()->isAdmin()? route('administrador'):route('gerencia')}}" class="">
				<img alt="" src="{{ asset('assets/app/media/img/logos/LOGO-SAYONARA-BLANCO.png') }}" style="max-width:150px; height: auto;"/>
			</a>
		</div>
		<div class="m-stack__item m-stack__item--middle m-brand__tools">
			<!-- BEGIN: Left Aside Minimize Toggle -->
			<a href="{{Auth::user()->isAdmin()? route('administrador'):route('gerencia')}}" id="" class="" >
					<img alt="" src="{{ asset('assets/app/media/img/logos/HAMBURGUESA-CORAZÓN.png') }}" style="max-width:30px; height: auto;"/>
			</a>
		</div>
	</div>
</div>
<!-- END: Brand -->
