@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Short Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Short Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Content List</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($portfolios as $portfolio)
                                        <tr>
                                            <td class="sorting_1 dtr-control" tabindex="0">{{ $portfolio->id }}</td>
                                            <td><img style="width: 120px;" class="portfolio_img" class="rounded avatar-xl mx-auto" src="{{ url($portfolio->portfolio_img) }}" alt="Portfolio Image"></td>
                                            <td>{{ $portfolio->portfolio_name }}</td>
                                            <td>{{ $portfolio->portfolio_title }}</td>
                                            <td>{{ $portfolio->portfolio_desc }}</td>
                                            <td>{{ $portfolio->portfolio_short_title }}</td>
                                            <td>{{ $portfolio->portfolio_short_desc }}</td>
                                            <td>
                                                <ul>
                                                    @foreach(explode('**', $portfolio->portfolio_list) as $list)
                                                        <li>{{ $list }}</li>
                                                    @endforeach
                                                </ul></td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('edit.portfolio', $portfolio->id) }}">Edit</a>
                                                <a class="btn btn-danger delete_img" href="{{ route('delete.portfolio', $portfolio->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/custom-script.js') }}"></script>
@endpush

@endsection