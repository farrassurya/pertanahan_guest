@extends('layouts.guest.app')

@section('title', 'User Management - Pertanahan')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">User Management</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('pages.guest.home') }}">Home</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">User</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- User Management Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">User Management</p>
            <h1 class="display-5 mb-5">Manage Users</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded p-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0">User List</h3>
                        <button class="btn btn-primary">Add New User</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                    <td><span class="badge bg-success">Admin</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning me-1">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>jane@example.com</td>
                                    <td><span class="badge bg-info">User</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning me-1">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User Management End -->
@endsection
