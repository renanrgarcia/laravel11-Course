@extends('admin.layouts.app')

@section('title', 'Index')

@section('content')
  <h1>Users</h1>

  <a href="{{ route('users.create') }}">Create User</a>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>E-mail</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>-</td>
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