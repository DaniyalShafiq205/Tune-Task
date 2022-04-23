@push('footer-css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush


@extends('layouts.app')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #354aa9;color:white">
        <i class="fa-solid fa-bars mr-3" style="font-size: 18px;"></i>
        <span class="ml-2 mr-5 " style="font-size: 23px;">User Dashboard</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">

                    <div class="form-check form-switch d-inline">
                        <input class="form-check-input example" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" onclick='handleClick(this);' name='name' />

                    </div>
                    <div class="d-inline" style="margin-right: 47px;margin-left: 5px;font-size: 17px;">
                        Name
                    </div>

                    <div class="form-check form-switch d-inline">
                        <input class="form-check-input example" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" onclick='handleClick(this);' name='impression_count' />

                    </div>
                    <div class="d-inline" style="margin-right: 47px;margin-left: 5px;font-size: 17px;">
                        Total Impressions
                    </div>



                    <div class="form-check form-switch d-inline">
                        <input class="form-check-input example" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" onclick='handleClick(this);' name='conversion_count' />

                    </div>
                    <div class="d-inline" style="margin-right: 47px;margin-left: 5px;font-size: 17px;">
                        Conversions
                    </div>



                    <div class="form-check form-switch d-inline">
                        <input class="form-check-input example" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" onclick='handleClick(this);' name='revenue_sum' />

                    </div>
                    <div class="d-inline" style="margin-right: 47px;margin-left: 5px;font-size: 17px;">
                        Revenue
                    </div>
            </ul>
            <div class="md-form mt-0">
                <i class="material-icons mdc-button__icon">search</i>
                <input class="form-control rounded-lg" style="background-color: #6879cd;border-color: transparent;padding-left: 35px; color:white;" type="search" placeholder="        Search..." aria-label="Search" onblur="handleClick(this)" name='search'>
              </div>
        </div>
    </nav>
    <div class="mx-5">
    <div class="row" id="cards-rows">


        </div>
    </div>
@endsection
