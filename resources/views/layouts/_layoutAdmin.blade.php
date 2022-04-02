<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!--[html-partial:include:{"file":"partials\/_header-base.html"}]/-->
    @include('layouts.partials._header-baseAdmin')
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="{{Auth::user()->isAdmin()?'padding-left:0px!important;':''}}">
        <!--[html-partial:include:{"file":"partials\/_aside-left.html"}]/-->
        @if(!Auth::user()->isAdmin())
            @include('layouts.partials._aside-leftAdmin')
        @endif
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!--[html-partial:include:{"file":"partials\/_subheader-default.html"}]/-->
            @include('layouts.partials._subheader-default')
            <div class="m-content" style="padding-top:0;">@yield('content')</div>
        </div>
    </div>
    <!-- end:: Body -->
    <!--[html-partial:include:{"file":"partials\/_footer-default.html"}]/-->
    @include('layouts.partials./_footer-default')
</div>
<!-- end:: Page -->
<!--[html-partial:include:{"file":"partials\/_layout-quick-sidebar.html"}]/-->
<!--[html-partial:include:{"file":"partials\/_layout-scroll-top.html"}]/-->
<!--[html-partial:include:{"file":"partials\/_layout-tooltips.html"}]/-->
