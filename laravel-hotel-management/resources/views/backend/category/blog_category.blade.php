@extends('admin.admin_dashboard')
@section('title','All Blog Category')
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
						
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Blopg Category</button>
                            

						
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Category</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Category Name</th>
										<th>Category Slug</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($category as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
										
										<td>{{$item->category_name}}</td>
										<td>{{$item->category_slug}}</td>
									
										<td class="d-flex; gap-3">
											

											<button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#category" id="{{$item->id}}" onclick="EditBlogCategory(this.id)">Edit</button>
											<a href="{{route('delete.blog.category',$item->id)}}" id="delete"><i class="btn btn-danger p-2" >Delete</i></a>
										</td>
									</tr>
									@endforeach
								
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			
			
				
			</div>

				<!-- Modal for Add Blog Category-->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"> Edit Blog Category</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="{{route('blog.category.store')}}" method="POST">
									@csrf
									<div class="form-group mb-3">
										<label for="" class="form-label">Blog Category New</label>
										<input type="text" name="category_name" id="cat" class="form-control">
									</div>
							
						 
							<div class="modal-footer">
							   
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
						</div>
						</div>
					</div>
				</div>



				<!-- Modal for Edit Blog Category-->
				<div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Blog Category</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="{{route('update.blog.category')}}"  method="POST">
									@csrf
									<input type="hidden" name="cat_id" id="cat_id">
									<div class="form-group mb-3">
										<label for="" class="form-label">Blog Category New</label>
										<input type="text" name="category_name" id="category_id" class="form-control" ">
									</div>
							
						 
							<div class="modal-footer">
							   
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
						</div>
						</div>
					</div>
				</div>



				<script>
				function EditBlogCategory(id){
					$.ajax({
					type: 'GET',
					url: '/edit/blog/category/' + id, // Corrected URL format
					dataType: 'json', // Fixed typo 'josn' to 'json'
					success: function(data) {
						$('#category_id').val(data.category_name);
						$('#cat_id').val(data.id);
						
						
					},
					})
				}
				</script>
@endsection