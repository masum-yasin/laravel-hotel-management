@extends('admin.admin_dashboard')
@section('title', 'Room Type List')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group" style="display: flex; justify-content: right;">
                    <a href="{{ route('add.room.type') }}" class="btn btn-primary px-5">Add Room Type</a>
                </div>
            </div>
        </div>

        <h6 class="mb-0 text-uppercase">All Room Type List</h6>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $item)
                                @php
                                    $room = App\Models\Room::where('roomtype_id', $item->id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ !empty($room->image) ? url('upload/roomimg/'.$room->image) : url('upload/no_image.jpg') }}" alt="" width="100px" height="70px">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td class="d-flex gap-3">
                                        <a href="{{ route('edit.room', $room->id) }}" class="btn btn-warning p-2">Edit</a>
                                        <a href="{{ route('room.delete', $room->id) }}" id="delete" class="btn btn-danger p-2">Delete</a>
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
