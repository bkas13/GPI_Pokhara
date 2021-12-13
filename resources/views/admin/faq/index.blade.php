@extends('admin.layouts.master')

@push('styles')
<script src="https://kit.fontawesome.com/3a77735fb2.js" crossorigin="anonymous"></script>
    {{--Page specific styles--}}

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.faq.all') }}">FAQ's</a></li>
                </ol>
            </div>
            <h5 class="page-title">Subjects</h5>

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
                    <div class="row mb-2 mb-3">
                        <div class="col-md-6">
                            <h4 class="mt-2 header-title">All FAQ's</h4>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <a href="{{ route('admin.faq.add') }}" class=" btn btn-primary">
                                ADD NEW
                            </a>
                        </div>
                    </div>

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead >
                        <tr>
                            <th>S.No</th>
                            <th>FAQ Title</th>
                            <th>FAQ Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($faqs as $faq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <label for="">{{$faq->title}}</label>
                                </td>
                                <td>
                                    @if($faq->status == "active")
                                    <h4><span class="badge badge-success">Active</span></h4>
                                    @else
                                    <h4><span class="badge badge-danger">InActive</span></h4>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.faq.edit',$faq->id) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.faq.delete',$faq->id) }}" class="btn btn-danger">
                                        Delete
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
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('admin/assets/pages/datatables.init.js') }}"></script>

@endpush
