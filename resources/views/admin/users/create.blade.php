@extends('admin.layouts.app')

@section('title', 'New User')

@section('content')
  <h1>New User</h1>

  {{-- @include('admin.includes.errors') --}}
  <x-alert />

  <form action="{{ route('users.store') }}" method="POST">
    <input type="text" name="_token" value="{{ csrf_token() }}"> {{-- @csrf() --}}
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Create</button>
  </form>
@endsection