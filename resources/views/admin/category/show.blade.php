@extends('layouts.admin')
@section('title')
    Category
@endsection


@section('content-title')
    Category
@endsection

@section('content-description')
    Show Category
@endsection

@section('page-title')
    Category
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-body">
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                            data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                            aria-selected="true" data-original-title="" title="">Show Category</a>
                                    </li>
                                </ul>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>SubCategories:</strong>
                                        {{-- <ul id="tree1">
                                        @foreach ($categories as $category)
                                            <li>
                                                {{ $category->name }}
				                                    @if (count($category->childs))

                                                <ul>
                                                        <li>@include('manageChild',['childs' => $category->childs])</li>
                                                </ul>
                                                @endif

                                                    
                                            </li>
                                        @endforeach
                                    </ul> --}}

                                        <ul class="sidebar-submenu">
                                            @foreach ($categories as $category)
                                                <li>

                                                    <a href="javascript:void(0)">
                                                        <i class="fa fa-circle"></i>
                                                        <span>{{ $category->name }}</span>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>

                                                    <ul class="sidebar-submenu">
                                                        @if (count($category->childs))
                                                            <li>

                                                                @include('manageChild',['childs' => $category->childs])
                                                            </li>
                                                        @endif


                                                    </ul>
                                                </li>
                                            @endforeach

                                        </ul>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
