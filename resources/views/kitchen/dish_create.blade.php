@extends("layouts.master")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kitchen Panel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create a delicious meal</h3>
                                <a
                                    href="/dish"
                                    class="btn btn-primary"
                                    style="float:right"
                                >Back</a>
                            </div>

                            <div class="card-body">
                                <!-- /resources/views/post/create.blade.php -->
                                <h1>Create Post</h1>
                                <!-- /resources/views/post/create.blade.php -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Create Post Form -->
                                <!-- Create Post Form -->
                                <form
                                    action="/dish"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            value="{{ old("name") }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select
                                            name="category_id"
                                            id="category_id"
                                            class="form-control"
                                        >
                                            <option>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label><br>
                                        <input
                                            type="file"
                                            name="image"
                                            id="image"
                                        >
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                    >Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
