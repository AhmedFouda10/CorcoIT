@extends('layouts.admin')
@section('title')
News
@endsection


@section('content-title')
News
@endsection

@section('content-description')
News List
@endsection

@section('page-title')
News
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <form class="form-inline search-form search-box">
                    <div class="form-group">
                        <input class="form-control-plaintext" type="search" placeholder="Search..">
                    </div>
                </form>
                    <a href="{{ route('news.create') }}" class="btn btn-primary mt-md-0 mt-2">Add New</a>

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
                                <th>Image</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Category Name</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($news as $new)
                                <tr>
                                    <td>{{ $new->id }}</td>

                                    <td>
                                        <img src="{{ asset('backend/assets/images/news/' . $new->image) }}"
                                            data-field="image" alt="">
                                    </td>

                                    <td data-field="name">{{ $new->title }}</td>

                                    <td data-field="price">{!! $new->body !!}</td>

                                    <td data-field="name">{{ $new->category->name }}</td>

                                    <td>
                                            <a href="{{ route('news.edit', $new->id) }}">
                                                <i class="fa fa-edit" title="Edit"></i>
                                            </a>
                                            <a href="{{ route('news.destroy', $new->id) }}">
                                                <i class="fa fa-trash" title="Delete"></i>
                                            </a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
