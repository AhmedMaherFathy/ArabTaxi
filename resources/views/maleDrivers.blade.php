@extends('layouts.dashboard')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('content')
@section('pageHeader', 'قائمه السائقين الرجال')



@if (Session::has('successful'))
    <p class="alert alert-success"> {{ session('successful') }}</p>
@endif
@if (Session::has('failed'))
    <p class="alert alert-danger">{{ session('failed') }}</p>
@endif
@if (Session::has('delete'))
    <p class="alert alert-danger">{{ session('delete') }}</p>
@endif

{{--  --}}
{{-- <div class="modal fade" id="showCarDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضف متحكم</h5>
                
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                
            </div>
        </div>
    </div>
</div> --}}
{{--  --}}


<div class="card-body" style="overflow: hidden;">
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="dataTable_length">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="overflow: hidden;">
                <table style="overflow: hidden;" class="table table-bordered dataTable" id="dataTable" width="100%"
                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead style="text-align: center;">
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending" style="width: 57.2px;">
                                الاسم
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 61.2px;">
                            العنوان
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 49.2px;">
                            التقيم
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30.2px;">
                            رقم الهاتف
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 49.2px;">
                            رخصه القياده
                        </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Age: activate to sort column ascending" style="width: 30.2px;">
                                ازاله
                            </th>
                        </th>
                            {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Age: activate to sort column ascending" style="width: 30.2px;">
                                ازاله
                            </th> --}}
                        </tr>
                    </thead>
                    {{-- <tfoot>
                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                </tfoot> --}}
                    <tbody style="text-align: center; " >
                        @foreach ($maleDrivers as $maleDriver)
                            <tr class="odd" style=" vertical-align:center;">
                                <td class="sorting_1" >{{ $maleDriver['name'] }}</td>
                                <td>{{$maleDriver['address']}}</td>
                            <td>{{$maleDriver['Rating']}}</td>
                            <td style="direction: ltr;">{{$maleDriver['phoneNumber']}}</td> 
                            <td>
                                {{$maleDriver['idNumber']}}
                                
                            </td>
                            <td >
                                <a href="#" data-toggle="modal" data-target="#showCarDetails{{ $maleDriver['id'] }}" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                        <span class="text"> عرض تفاصيل السياره</span>
                                </a>
                                
                                <a href="{{ route('delete.driver', $maleDriver->id) }}" class="btn btn-danger btn-icon-split mt-1" >
                                    <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">ازل السائق</span>
                                </a>
                                {{--  --}}
                                <div class="modal fade" id="showCarDetails{{ $maleDriver['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">اضف متحكم</h5>
                                                
                                            </div>
                                            <div class="modal-body" >
                                                <p style="text-align: right;"><strong >الموديل :</strong> {{ $maleDriver['model'] }}  </p>
                                                <p style="text-align: right;"><strong>صوره السياره :</strong> {{ $maleDriver['carPicture'] }}</p>
                                                <p style="text-align: right;"> <strong> رخصه القياده :</strong> {{ $maleDriver['drivingLicense'] }}</p>
                                                {{-- <p><strong>Phone Number:</strong> {{ $maleDriver->id ?? '' }}</p>
                                                <p><strong>ID Number:</strong> {{ $modalDriverIdNumber ?? '' }}</p> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        {{--  --}}
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{-- </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div> --}}
            </div>
        </div>
@endsection
