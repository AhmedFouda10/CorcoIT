@extends('layouts.admin')
@section('title')
Category
@endsection


@section('content-title')
Category
@endsection

@section('content-description')
List Category
@endsection

@section('page-title')
Category
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form class="form-inline search-form search-box">
                    <div class="form-group">
                        <input class="form-control-plaintext" type="search" placeholder="Search..">
                    </div>
                </form>
                {{-- @can('create Category') --}}
                    <a class="btn btn-primary mt-md-0 mt-2" href="{{ route('category.create') }}">Add Category</a>
                {{-- @endcan --}}
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif


                <div class="table-responsive table-desi">
                    <table class="table list-digital all-package table-category " id="editableTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('category.show', $category->id) }}">
                                            <i class="fa fa-eye" title="Show SubCategories"></i>
                                        </a>

                                        <a href="{{route('category.edit',$category->id)}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash" title="Delete"></i>
                                        </a>
                                        

                                    </td>
                                </tr>
                            @endforeach
                            {{-- @foreach($categories as $category)
				                <li>
				                    {{ $category->name }}
				                    @if(count($category->childs))
				                        @include('manageChild',['childs' => $category->childs])
				                    @endif
				                </li>
				            @endforeach --}}
                        </tbody>
                    </table>
                </div>

            </div>
            {!! $categories->links() !!}

        </div>
    </div>
@endsection
