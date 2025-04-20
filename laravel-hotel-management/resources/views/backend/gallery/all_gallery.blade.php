@extends('admin.admin_dashboard')
@section('title','All Gallery')
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
							<a href="{{ route('add.gallery') }}">
								<i class="btn btn-primary px-5">Add Gallery</i>
							</a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Gallery</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<form action="{{route('delete.gallery.multiple')}}" method="POST">
								@csrf
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:50px">Selected Image</th>
										<th style="width:50px">Sl</th>
										<th>Image</th>
										<th>Action</th>
									
									</tr>
								</thead>
								<tbody>
									@foreach ($gallery as $key=>$item)
									<tr>
										<td><input type="checkbox" class="control-form" name="selectedItem[]" value="{{$item->id}}"></td>
										<td>{{$key+1}}</td>
										<td><img src="{{asset($item->photo_name)}}" alt="" style="width:80px; height:80px"></td>
										
										<td class="d-flex; gap-3">
											<a href="{{route('edit.gallery',$item->id)}}"><i class="btn btn-warning p-2">Edit</i></a>
											<a href="{{route('delete.gallery',$item->id)}}" id="delete"><i class="btn btn-danger p-2" >Delete</i></a>
										</td>
									</tr>
									@endforeach
								
								</tbody>
								
							</table>
							<button type="submit" class="btn btn-danger">Delete MultiImage</button>
						</form>

						</div>
					</div>
				</div>
			
			
				
			</div>
@endsection