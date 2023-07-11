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
                    <h4>Customer: <?= $params['name'] ?>
                        <a href="/api/customers" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="fs-3">Name:</label>
                        <p class="fs-2 fw-bold"><?= $params['name'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fs-3">Email:</label>
                        <p class="fs-2 fw-bold"><?= $params['email'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fs-3">Gender:</label>
                        <p class="fs-2 fw-bold"><?= $params['gender'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fs-3">Status:</label>
                        <p class="fs-2 fw-bold"><?= $params['status'] ?></p>
                    </div>
                </div>
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
