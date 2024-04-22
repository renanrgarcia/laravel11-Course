@extends('admin.layouts.app')

@section('title', 'New User')

@section('content')
<h1>New User</h1>

<form action="{{ route('users.store') }}" method="POST">
  <input type="text" name="_token" value="{{ csrf_token() }}">
  <input type="text" name="name" placeholder="Name">
  <input type="email" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <button type="submit">Create</button>
</form>
@endsection