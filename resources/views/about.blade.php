@extends('layouts.main')

<html lang="en">

  @section('container')

	<h1>halaman about</h1>
	<h3>{{ $name }}</h3>
	<p>{{ $email }}</p>
	<img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbail rounded-circle">

  @endsection