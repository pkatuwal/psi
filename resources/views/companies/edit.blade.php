@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ "Please fill out the form below." }}</div>

                <div class="card-body " style="padding: 10px;">
                    <form  action="{{ route('company.update', $company->id) }}" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="row" style="text-align: center; margin-top: 5px;">
                            <div class="col-md-5">
                                <label for="company_name"> Company Name </label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="company_name" value="{{ $company->name }}" class="form-control">
                            </div>
                        </div>

                        <div class="row" style="text-align: center; margin-top: 5px;">
                            <div class="col-md-5">
                                <label for="section1"> Section 1 </label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="section1" class="form-control">                                    
                            </div>
                        </div>

                        <div class="row" style="text-align: center; margin-top: 5px;">
                            <div class="col-md-5">
                                <label for="section2"> Section 2 </label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="section2" class="form-control">                                    
                            </div>
                        </div>

                        <div class="row" style="text-align: center; margin-top: 5px;">
                            <div class="col-md-5">
                                <label for="address"> Address </label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="address" value="{{ $company->address }}" class="form-control">                                    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <button style="margin-top: 15px" type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>           
                    </form>
                    
                    <div>
                        <table class="table-hover" cellpadding="6px" width="100%" style="text-align: center; margin-top:20px;">
                            <tr>
                                <th>Company Name</th>
                                <th>Section 1</th>
                                <th>Section 2</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            @foreach($companies as $company)
                                <tr>
                                    <td> {{ $company->name }} </td>
                                    @php
                                        $c = App\Http\Controllers\CompanyController::sections($company->id);
                                    @endphp
                                    @if(count($c)==0)
                                        <td>---</td>
                                        <td>---</td>
                                    @endif
                                    @if(count($c)==1)
                                        @foreach($c as $c)                                        
                                            <td> {{ $c }} </td>
                                        @endforeach
                                        <td>---</td>
                                    @endif
                                    @if(count($c)==2)
                                        @foreach($c as $c)
                                            <td>{{ $c }}</td>
                                        @endforeach
                                    @endif                                        
                                    <td> {{ $company->address }} </td>
                                    <td><a href="{{ route('company.edit', $company->id) }}" class="btn btn-link btn-sm" > Edit</a> </td>
                                </tr>
                            @endforeach

                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection