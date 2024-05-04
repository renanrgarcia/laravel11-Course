@extends('admin.layouts.app')

@section('title', 'Edit user')

@section('content')
  <h1>Edit User {{ $user->name }}</h1>

  {{-- @include('admin.includes.errors') --}}
  <x-alert />

  <form action="{{ route('users.update', $user->id) }}" method="POST">
    <input type="text" name="_token" value="{{ csrf_token() }}"> {{-- @csrf() --}}
    @method('PUT') {{-- <input type="text" name="_method" value="PUT"> --}}
    <input type="text" name="name" placeholder="Name" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Submit</button>
  </form>
@endsection