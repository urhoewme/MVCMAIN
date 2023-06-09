<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Customer Details
                        <a class="btn btn-primary float-end" href="/create">Add customer</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Gender</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($params as $param): ?>
                            <tr>
                                <td><?= $param->id ?></td>
                                <td><?= $param->name ?></td>
                                <td><?= $param->email ?></td>
                                <td><?= $param->gender ?></td>
                                <td><?= $param->status ?></td>
                                <td>
                                    <a href="/edit?id=<?= $param->id; ?>" class="btn btn-primary">EDIT</a>
                                    <form action="/delete?id=<?= $param->id; ?>" method="post"><button type="submit" class="btn btn-danger"
                                             onclick="return confirm('Are you sure ?')">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
