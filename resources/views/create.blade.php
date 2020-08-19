@extends('layouts.main')

@section('content-header')
Product
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Listing</a></li>
    <li class="breadcrumb-item active"><a href="{{ url('/create') }}">Create</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @include('components.alert')

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ $route == 'create' ? 'Create New ' : 'Update ' }}Product</h3>
                </div>

                <form class="form-horizontal" action="{{ $route }}" method="POST">
                    @csrf
                    @if (isset($product) && $product->id)
                        <input type="hidden" name="id" value="{{ $product->id }}">
                    @endif
                    <div class="card-body">
                        @include('components.text_input', [
                        'name' => 'code',
                        'label' => 'Code',
                        'placeholder' => 'Code',
                        'disabled' => $route == 'update',
                        'value' => isset($product->code) ? $product->code : '',
                        ])

                        @include('components.text_input', [
                        'name' => 'name',
                        'label' => 'Name',
                        'placeholder' => 'Name',
                        'value' => isset($product->name) ? $product->name : '',
                        ])

                        @include('components.text_input', [
                        'name' => 'category',
                        'label' => 'Category',
                        'placeholder' => 'Category',
                        'value' => isset($product->category) ? $product->category : '',
                        ])

                        @include('components.text_input', [
                        'name' => 'brand',
                        'label' => 'Brand',
                        'placeholder' => 'Brand',
                        'value' => isset($product->brand) ? $product->brand : '',

                        ])

                        @include('components.text_input', [
                        'name' => 'type',
                        'label' => 'Type',
                        'placeholder' => 'Type',
                        'value' => isset($product->type) ? $product->type : '',
                        ])

                        @include('components.textarea_input', [
                        'name' => 'description',
                        'label' => 'Description',
                        'placeholder' => 'Description',
                        'rows' => '3',
                        'value' => isset($product->description) ? $product->description : '',
                        ])
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <a class="btn btn-default" href="/">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
