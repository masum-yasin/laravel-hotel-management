@extends('admin.admin_dashboard')
@section('title','All Blog Post')
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
							<a href="{{ route('add.blog.post') }}">
								<i class="btn btn-primary px-5">Add Blog Post</i>
							</a>
							
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Blog Post</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
                                        <th>Post Image</th>
										<th>Post Title</th>
										<th>Category</th>
									
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($allPost as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{asset($item->post_image)}}" alt="" style="width: 80; height:70px"></td>
										<td>{{$item->post_title}}</td>
										<td>{{$item['blogCategory']['category_name']}}</td>
										
										<td class="d-flex; gap-3">
											<a href="{{route('blogpost.edit',$item->id)}}"><i class="btn btn-warning p-2">Edit</i></a>
											<a href="{{route('blogpost.delete',$item->id)}}" id="delete"><i class="btn btn-danger p-2" >Delete</i></a>
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