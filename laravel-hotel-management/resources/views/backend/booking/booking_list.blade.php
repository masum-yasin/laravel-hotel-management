@extends('admin.admin_dashboard');
@section('title','All Team')
@section('admin')
    <div class="page-content">
				<!--breadcrumb-->
			
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form Elements</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group" style="display:flex justify-content:right">
							<a href="{{ route('create.team') }}">
								<i class="btn btn-primary px-5">Add Booking</i>
							</a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Booking</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>B NO</th>
										<th>B Date</th>
										<th>Customer</th>
										<th>Room</th>
										<th>Check IN/Out</th>
										<th>Total Room</th>
										<th>Guest</th>
										<th>Payment</th>
										<th>Status</th>
										<th>Action</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($allData as $key=>$item)

									<tr>
										<td>{{$key+1}}</td>
                                        <td><a href="{{route('edit_booking', $item->id)}}">{{$item->code;}}</a></td>
                                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                                        <td>{{$item['user']['name']}}</td>
                                        <td>{{$item['room']['type']['name']}}</td>
                                        <td class="p-4"><span class="badge bg-primary">{{$item->check_in}}</span> / <br> <span class="badge- bg-warning text-dark">{{$item->check_out}} </span></td>
                                        <td>{{$item->number_of_rooms}}</td>
                                        <td>{{$item->persion}}</td>
										<td>
											@if ($item->payment_status == '1')
												<span class="text-success">complete</span>
											@else
												<span class="text-danger">pending</span>
											@endif
										</td>
										<td>
											@if ($item->status == '1')
												<span class="text-success">Active</span>
											@else
												<span class="text-danger">pending</span>
											@endif
										</td>
										
										
										<td class="d-flex gap-3 p-4">
											<a href="{{ route('team.edit', $item->id) }}"><i class="btn btn-warning p-2">Edit</i></a>
											<a href="{{ route('team.delete', $item->id) }}" id="delete"><i class="btn btn-danger p-2">Delete</i></a>
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