@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h3>Company Shift</h3></center>  <br>
        <div class="row">
        	<div class="mo-col-10 offset-1">
        		<table class="table table-striped">
        			<thead>
        				<th> Time </th>
        				<th> Company </th>
        				<th> Type </th>
        				@foreach($dates as $date)
        					<th>{{ date('m-d', strtotime( $date->date )) }}</th>
        				@endforeach        		
        			</thead>
        			<tbody>
        				<tr>
        					@foreach($times as $time)
                                @foreach($companies as $company)

                                    @foreach($types as $type)
                                            
                                    <tr>
                                        <td> {{ $time->time.':00' }} </td>
                                            <td > {{ $company->comp->name }} </td>
                                        <td> {{ ucfirst($type) }} </td>
                                        
                                            @foreach($dates as $date)
                                                @php
                                                    $ctt = App\Http\Controllers\PagesController::getCtt($time->time, $company->id, $date->date);
                                                @endphp
                                                @if ($ctt->$type != 0)
                                                    <td class="contenteditable"
                                                        contenteditable="true"> {{ $ctt->$type }} </td>
                                                @else
                                                    <td class="contenteditable"
                                                        contenteditable="true"> {{ '' }} </td>
                                                @endif
                                            @endforeach
                                            </tr>
                                        @endforeach

                                @endforeach
                            @endforeach
        				</tr>
        			</tbody>
        		</table>        		
        	</div>        	
        </div>        
    </div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        var tds = document.querySelectorAll("td.contenteditable");
        tds.forEach(function(el, index){
            employee.inlineEditable(el, function(response){
                
            });
        })
    });
    
</script>
@endpush
