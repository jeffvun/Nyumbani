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

    <div class = "content">
    <h2>Add Request</h2>

    <form action='<?= base_url('Requests/store') ?>' method='post'>
        <div class="form-group">
            <label>Propert ID</label>
            <input type="number" class="form-control" id="propertyID" name = "propertyID" placeholder="Enter property ID">
        </div>

        <div class="form-group">
            <label>Request message</label>
            <textarea class="form-control" id="requestMessage" name="requestMessage" rows="3"></textarea>
        </div>

       <!-- <div class="form-group">
            <label>Request status</label>
            <select class="form-control" id="requestStatus" name = "requestStatus">
            <option>Pending</option>
            <option>Closed</option>
           
            </select>
        <div> -->

        <br>
        <br>
        <br>


       <!--- <div class = "form-group">
            <label> Date Completed</label>
            <input type="date" class="datepicker" data-date-format="mm/dd/yyyy" name = "dateCompleted">
        </div> -->

        <br>


            <button type="submit" class="btn btn-primary">Add Request</button>
        </div>
  
    </form>

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>