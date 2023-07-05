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
                    <h4>Customer Edit
                        <a href="/api/customers" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label>Name</label>
                            <input value="<?= $params['name'] ?>" name="name" required type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Mail</label>
                            <input value="<?= $params['email'] ?>" name="email" required type="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">Gender</label>
                            <select class="form-select" name="gender" >
                                <option value="male" name="male" <?php echo $params['gender']==="male"?"selected":""?>>Male</option>
                                <option value="female" name="female" <?php echo $params['gender']==="female"?"selected":""?>>Female</option>
                            </select>
                            <label class="mt-2">Status</label>
                            <select class="form-select" name="status" >
                                <option value="active" name="active" <?php echo $params['status']==="active"?"selected":""?>>Active</option>
                                <option value="inactive" name="inactive" <?php echo $params['status']==="inactive"?"selected":""?>>Inactive</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary float-start">UPDATE</button>
                    </form>
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
