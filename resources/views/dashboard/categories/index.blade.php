@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Category</h1>
</div>

{{-- Alert --}}
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>  
@endif

<div class="table-responsive col-lg-15">
	<a href="/dashboard/categories/create" class="btn btn-outline-primary mb-3">Create New Category</a>
    <table class="table table-bordered">
		<thead>
			<tr class="text-center">
			<th scope="col">#</th>
			<th scope="col">Category Name</th>
			<th scope="col">Action</th>
			</tr>
		</thead>
        <tbody>
            @foreach($categories as $category)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info" title="Info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning" title="Edit"><span data-feather="edit"></span></a>
                        <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('Are You Sure?')"><span data-feather="trash-2"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
@endsection


