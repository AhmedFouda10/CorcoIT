@extends('layouts.admin')
@section('title')
News
@endsection


@section('content-title')
News
@endsection

@section('content-description')
News Add
@endsection

@section('page-title')
News
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('error'))
                <span class="text text-danger">{{ Session::get('error') }}</span>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="container-fluid">
                    <div class="card tab2-card">
                        <div class="card-body">
                            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                                        data-bs-toggle="tab" href="#general" role="tab"
                                        aria-controls="general" aria-selected="true" data-original-title=""
                                        title="">Add News</a></li>

                            </ul>
                            <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data" class="dropzone digits" id="singleFileUpload">
                                @csrf
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="general" role="tabpanel"
                                        aria-labelledby="general-tab">
                                        <div class="form-group row">
                                            <label for="validationCustom0"
                                                class="col-xl-3 col-md-4"><span>*</span>
                                                Title</label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" id="validationCustom0"
                                                    type="text" name="title" required value="{{old('title')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row editor-label">
                                            <label class="col-xl-3 col-md-4"><span>*</span>
                                                Body</label>
                                            <div class="col-xl-8 col-md-7">
                                                <div class="editor-space">
                                                    <textarea id="editor1" cols="30" rows="10" name="body">{{old('body')}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row editor-label">
                                            <label class="col-xl-3 col-md-4"><span>*</span>
                                                Image</label>
                                            <div class="col-xl-8 col-md-7">
                                                <div class="editor-space">
                                                    <input type="file" class="form-control" name="image" id="" value="{{old('image')}}">
                                                </div>
                                            </div>

                                        </div>
                                        
                                        

                                        <div class="form-group row">
                                            <label for="inputName" class="col-xl-3 col-md-4"><span>*</span>
                                                {{ trans('main_trans.Category Name') }}</label>
                                            <div class="col-xl-8 col-md-7">

                                            <select name="category_id" class="form-control SlectBox" required onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')">
                                                <!--placeholder-->
                                                <option value="" selected disabled>-- Select Category --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        

                                    </div>

                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">{{ trans('main_trans.Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
@endsection
