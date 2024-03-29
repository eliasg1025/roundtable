@extends('layouts.app')

@section('content')
	<home
		:data="{{ json_encode($data) }}"
		csrf="{{ csrf_token() }}"
		href_login="{{ route('login') }}"
		href_register="{{ route('register') }}"
		href_reset_password="{{ route('password.request') }}"
	>
	</home>
@endsection
