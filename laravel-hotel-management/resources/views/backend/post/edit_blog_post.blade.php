@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit  Blog Post</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog Post</li>
                    </ol>
                </nav>
            </div>
          
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        
                        <div class="card">
							<div class="card-body p-4">
							
								<form class="row g-3" method="POST" action="{{route('blogpost.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$blogpost->id}}">
									<div class="col-md-6">
										<label for="input1" class="form-label">Edit Blog Category</label>
										<select class="form-select" id="input39" name="blogcat_id">
											<option value="">Selected Blog Category</option>
											@foreach ($blogCategory as $cat)
											<option  value="{{$cat->id}}" {{$cat->id == $blogpost->blogcat_id ? 'selected': ''}}>{{$cat->category_name	}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-6">
										<label for="input2" class="form-label">Post Title</label>
										<input type="text" class="form-control" id="input2" name="post_title" value="{{$blogpost->post_title}}">
									</div>
									<div class="col-md-12">
										<label for="input11" class="form-label">Short Descriptaion</label>
										<textarea class="form-control" id="input11" rows="3" name="short_descp">{{$blogpost->short_descp}}</textarea>
									</div>
									<div class="col-md-12">
										<label for="input11" class="form-label">Long Descriptaion</label>
										<textarea class="form-control" id="editor"  rows="3" name="long_descp">{!! $blogpost->long_descp!!}</textarea>
									</div>
									<div class="col-md-4">
										<label for="input2" class="form-label">Image</label>
										<input type="file" class="form-control" id="image" name="post_image">
									</div>
									<div class="col-md-6">
										<img id="showImage"
                                            src="{{asset($blogpost->post_image)}}"
                                            class="rounded-circle p-1 bg-primary" alt="" width="120px">

									</div>
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Submit</button>
										
										</div>
									</div>

									
								</form>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            });
        });
    </script>

   
@endsection
