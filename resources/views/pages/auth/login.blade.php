@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login Page')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-2">
                        <a href="{{url('/')}}" class="app-brand-link gap-2">
                            <img src="{{ asset('assets/img/logos/honda.png') }}" alt="" width="100">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-3 text-center fw-bold">Welcome to {{config('variables.templateName')}}! 👋</h4>

                    {{-- START LOGIN FORM --}}
                    {{-- TODO: --}}
                    @livewire('auth.login.form')
                    {{-- END LOGIN FORM --}}

                </div>
            </div>
        </div>
        <!-- /Register -->
    </div>
</div>
</div>
@endsection
