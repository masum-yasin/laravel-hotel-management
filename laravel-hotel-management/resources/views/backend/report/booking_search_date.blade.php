@extends('admin.admin_dashboard')
@section('title','All Booking Invoice')
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
							<a href="{{ route('booking.report') }}">
								<i class="btn btn-primary px-5">Search Booking</i>
							</a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Booking Invoice</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Code</th>
										<th>Name</th>
										<th>Email</th>
										<th>Payment Method</th>
										<th>Total Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($booking as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
									    <td>{{$item->code}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
										<td>{{$item->payment_method}}</td>
										<td>{{$item->total_price}}</td>
										<td class="d-flex; gap-3">
                                            <a href="{{route('download.invoice', $item->id)}}" class="btn btn-warning px-2 radious-10"><i class="lni lni-download"></i> Download Invoice</a>
											
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