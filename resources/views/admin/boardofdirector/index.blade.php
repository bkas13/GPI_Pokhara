@extends('admin.layouts.master')

@push('styles')

    {{--Page specific styles--}}

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.boardsofdirector.all') }}">Board Of Directors</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('staff') }}</h5>

        </div>
    </div>
    <!-- end row -->

@endsection

@section('contents')

    {{--Page Specific Content--}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title text-center">{{ getLanguage('staff-setup') }}</h4>
                    <div>
                        <a href="{{ route('admin.boardsofdirector.add') }}" class="pull-right btn btn-primary">
                            {{ getLanguage('add-new').' '.getLanguage('staff') }}</a>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{ getLanguage('serial-1') }}</th>
                            <th>{{ getLanguage('name') }}</th>
                            <th>{{ getLanguage('job-title') }}</th>
                            <th>{{ getLanguage('phone') }}</th>
                            <th>{{ getLanguage('action') }}</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($contents as $content)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$content->name}}</td>
                                <td>{{$content->job_title}}</td>
                                <td>{{$content->phone}}</td>
                                <td>
                                    <a href="{{ route('admin.boardsofdirector.view',$content->slug) }}" class="btn btn-primary btn-icon-text mr-2 p-1" title="View Details">
                                        <i class="fa fa-eye"></i>
                                        {{ getLanguage('details') }}
                                    </a>

                                    <a href="{{ route('admin.boardsofdirector.edit',$content->slug) }}" class="btn btn-primary btn-icon-text mr-2 p-1" title="Edit">
                                        <i class="fa fa-edit"></i>
                                        {{ getLanguage('edit') }}
                                    </a>

                                    <a href="{{ route('admin.boardsofdirector.delete',$content->slug) }}" class="btn btn-danger btn-icon-text mr-2 p-1" title="Delete">
                                        <i class="fa fa-trash"></i>
                                        {{ getLanguage('delete') }}
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

@push('scripts')

    {{--Page specific scripts--}}
    <!-- Required datatable js -->
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('admin/assets/pages/datatables.init.js') }}"></script>


@endpush
