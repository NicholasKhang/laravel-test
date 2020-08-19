@push('scripts')
    <script>
        $('#per-page').change(function() {
            var perPage = $('#per-page option:selected').val();
            var page = '{{ $page }}';
            var url = '{{ url()->current() }}?page=' + page + '&per_page=' + perPage;
            window.location = url;
        });

    </script>
@endpush

@extends('layouts.main')

@section('content-header')
    Products
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Listing</li>
    <li class="breadcrumb-item "><a href="{{ url('create') }}">Create</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Listing</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-success" href="/create">Create New Product</a>
                        </div>
                        <div class="col-6 text-right">
                            <label>
                                <span>Show&nbsp;</span>
                                <select id="per-page" class="custom-select form-control" style="width: auto;">
                                    <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                    <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                                </select>
                                <span>&nbsp;items</span>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table id="product" class="table table-bordered table-responsive table-striped">
                                <thead>
                                    <tr class="bg-secondary">
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $p)
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->code }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->category }}</td>
                                            <td>{{ $p->brand }}</td>
                                            <td>{{ $p->type }}</td>
                                            <td>{{ $p->description }}</td>
                                            <td><a href="{{ url('update?id=' . $p->id) }}"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            Showing {{ $products->toArray()['from'] }} - {{ $products->toArray()['to'] }} of
                            {{ $products->toArray()['total'] }} items
                        </div>
                        <div class="col-sm-12 col-md-4">
                            {{ $products->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
