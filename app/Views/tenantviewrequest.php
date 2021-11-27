<!DOCTYPE html>
<html lang="en">

<head>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link rel="stylesheet" href="css/Application.css">
</head>

<body>
    <nav>

    </nav>
    <main>
    <div class = "col-md-12 mt-5">
    <?php
        if(session()->getFlashdata('status')) {
            echo "<h4>".session()->getFlashdata('status')." </h4>";
        }
    ?>
</div>

<div class = "card">
    
<div class="card-header">
<h5>Maintenance</h5>

<a href="<?= base_url('Requests/addRequest') ?>" class = "btn btn-primary float-right">Add Requests </a>
</div>

<div class="card-body">


<table class="table table-bordered">
  <thead>
    <tr>
    
      <th scope="col">Ticket ID</th>
      <th scope="col">Issue Raised</th>
      <th scope="col">Date Raised</th>
      <th scope="col">Date Handled</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($request as $row): ?>
    <tr>
     
      <td> <?= $row['requestID'] ?></td>
      <td> <?= $row['requestMessage'] ?></td>
      <td> <?= $row['dateRequested'] ?></td>
      <td> <?= $row['dateCompleted'] ?></td>

      <td>
         <?php if($row['requestStatus']==1){?>
            <button id="button">
               <?php echo '<a href="" class="edit">Closed</a>';} ?>
            </button>
            
            <?php if($row['requestStatus']==0){?>
                 <button id="button">
                  <?php echo '<a href="" class="pending">Pending</a>';} ?>
            </button>
      </td>

      <td>
          <a href="" class = "btn btn-success btn-sm">Edit</a>
          <a href="?>" class = "btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>

</div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>