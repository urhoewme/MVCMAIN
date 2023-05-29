<?php

$this->title = 'Contact Us';
?>

<h1>Contact Us</h1>

<form action="" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Subject</label>
        <input type="text" class="form-control" name="subject" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Body</label>
        <textarea class="form-control" name="body"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>