@extends('admin.layouts.app')

@section('title', 'Index')

@section('content')
  <h1>Users</h1>

  <a href="{{ route('users.create') }}">Create User</a>

  <x-alert />  
    
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <a href="{{ route('users.edit', $user) }}">Edit</a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="100">No users found</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $users->links() }}
@endsection