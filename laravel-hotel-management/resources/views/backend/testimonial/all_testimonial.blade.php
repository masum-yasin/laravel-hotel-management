@extends('admin.admin_dashboard')
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
								<li class="breadcrumb-item active" aria-current="page">All Testimonial</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group" style="display:flex justify-content:right">
							<a href="{{ route('testimonial.add') }}">
								<i class="btn btn-primary px-5">Add Testimonial</i>
							</a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Testimonial</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Image</th>
										<th>Name</th>
										<th>city</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($testimonial as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{asset($item->image)}}" alt="" style="width: 70; height:40px"></td>
										<td>{{$item->name}}</td>
										<td>{{$item->city}}</td>
										<td class="d-flex; gap-3">
											<a href="{{route('team.edit',$item->id)}}"><i class="btn btn-warning p-2">Edit</i></a>
											<a href="{{route('team.delete',$item->id)}}" id="delete"><i class="btn btn-danger p-2" >Delete</i></a>
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