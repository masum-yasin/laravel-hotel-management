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
								<li class="breadcrumb-item active" aria-current="page">Form Elements</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group" style="display:flex justify-content:right">
							<a href="{{ route('create.team') }}">
								<i class="btn btn-primary px-5">All Contact Message</i>
							</a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Contact Message</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Name</th>
										<th>Emil</th>
										<th>Phone</th>
										<th>Subject</th>
										<th>Message</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($contactMessage as $key=>$contact)
									<tr>
										<td>{{$key+1}}</td>
									
										<td>{{$contact->name}}</td>
										<td>{{$contact->email}}</td>
										<td>{{$contact->phone}}</td>
										<td>{{$contact->subject}}</td>
										<td>{{$contact->message}}</td>
                                        <td>{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</td>


										
									</tr>
									@endforeach
								
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			
			
				
			</div>
@endsection