@extends('layouts.dashboard')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('content')
@section('pageHeader', 'قائمه المتحكمين')
{{-- @section('name',{{ Auth::user()->name }}) --}}


@if(Session::has('successful'))
    <p class="alert alert-success"> {{ session('successful') }}</p>
@endif
@if(Session::has('failed'))
    <p class="alert alert-danger">{{ session('failed') }}</p>
@endif
@if(Session::has('delete'))
    <p class="alert alert-danger">{{ session('delete') }}</p>
@endif


<a href="#"  data-toggle="modal" data-target="#AddAdmin"  class="btn btn-success btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-check"></i>
    </span>
    <span class="text">اضف متحكم</span>
</a>


{{--  --}}
<div class="modal fade" id="AddAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضف متحكم</h5>
                    
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.list.register')}}" method="POST" style="direction: ltr;" >
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Full name" name="name">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="phone" name="phone">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" placeholder="Password" name="password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <select class="custom-select  " id="inputGroupSelect01" name="role">
                            <option selected>Choose Role</option>
                            <option value="boss">boss</option>
                            <option value="supervisor">supervisor</option>
                            <option value="Card recharge manager">Card recharge manager</option>
                          </select>
                          <br>
                        {{-- <div class="input-group mb-3">
                          <input type="password" class="form-control" placeholder="Retype password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div> --}}
                        {{-- </div> --}}
                        <div class="row">
                          <div class="col-8">
                            {{-- <div class="icheck-primary">
                              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                              <label for="agreeTerms">
                               I agree to the <a href="#">terms</a>
                              </label>
                            </div> --}}
                          </div>
                          <!-- /.col -->
                          <div class="col-4">
                            <input type="submit" class="btn btn-primary btn-block mt-3" value="Register">
                          </div>
                          <!-- /.col -->
                        </div>
                      </form>
                </div>
                {{-- <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
{{--  --}}


<div class="card-body" style="overflow: hidden;">
    <div class="table-responsive" >
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="dataTable_length">
                        </div></div>
                        <div class="col-sm-12 col-md-6">
                            </div></div></div><div class="row">
                                <div class="col-sm-12" style="overflow: hidden;">
            <table style="overflow: hidden;" class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead style="text-align: center;">
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 57.2px;">
                            الاسم
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 61.2px;">
                            البريد الاكترونى
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 49.2px;">
                            التصنيف
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30.2px;">
                            رقم الهاتف
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30.2px;">
                            ازاله
                        </th>
                        
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                </tfoot> --}}
                <tbody style="text-align: center;">
                    @foreach ($admin as $adminItem)
                        <tr class="odd">
                            <td class="sorting_1">{{ $adminItem['name'] }}</td>
                            <td>{{$adminItem['email']}}</td>
                            <td>{{$adminItem['role']}}</td>
                            <td style="direction: ltr;">{{$adminItem['phone']}}</td>
                            <td>
                                <a href="{{ route('delete.user', $adminItem->id) }}" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">ازل المتحكم</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
        </table>
    {{-- </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div> --}}
    </div>
</div>
@endsection

