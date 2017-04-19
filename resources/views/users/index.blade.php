@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
    <thead>
        <th>
            ID
        </th>
        <th>
            NAME
        </th>
        <th>
            EMAIL
        </th>
        <th>

        </th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                {{ $user->id }}
            </td>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
				<form action="{{ Route::has('users.destroy') ? route('users.destroy', ['id' => $url->id]) : '#' }}" method="POST" onsubmit="return confirm('Do you really want to delete the user?');" class="form-inline pull-right">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-lg btn-danger">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if( method_exists($users, 'links') )
    {{ $users->links() }}
@endif
@append

@section('styles')
<link href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

<style type="text/css">
    .table :last-child > a {
        margin-left: 8px;
    }
    .table :last-child > form {
        margin-left: 8px;
    }
</style>
@append