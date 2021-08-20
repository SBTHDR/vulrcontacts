<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<div class="container">
        <div class="row p-5" id="app">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Teachers</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>DIU</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 id="addTeacher">Add New Teacher</h5>
                        <h5 id="updateTeacher">Update Teacher</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" class="form-control" id="name" placeholder="Teacher name">
                              <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Teacher title">
                                <span class="text-danger" id="titleError"></span>
                              </div>
                              <div class="mb-3">
                                <label for="institute" class="form-label">Institute</label>
                                <input type="text" class="form-control" id="institute" placeholder="Teacher institute">
                                <span class="text-danger" id="instituteError"></span>
                              </div>
                            <button type="submit" id="addButton" class="btn btn-primary">Add</button>
                            <button type="submit" id="updateButton" class="btn btn-primary">Update</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>