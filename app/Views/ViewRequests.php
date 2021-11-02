<!DOCTYPE html>
<html lang="en">

<head>
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
        <div>
            <h3>Requests</h3>
        </div>
        <hr/><br>
        <div class="container">
            <table >
                <thead>
                    <tr class="title">
                        <td class="td_title">Name</td>
                        <td class="td_title">Date Open</td>
                        <td class="td_title">Date Closed</td>
                        <td class="td_title">Request</td>
                        <td class="td_title">Property</td>
                        <td class="td_title">Details</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $requests_decoded = json_decode($ViewRequests);
                    foreach($requests_decoded as $row):?>    
                    <tr>
                        <td><label><?php echo $row->firstName; ?></label></td>
                        <td><label><?php echo $row->dateRequested; ?></label></td>
                        <td><label><?php echo $row->dateCompleted; ?></label></td>
                        <td><label><?php echo $row->propertyPhysicalAddress; ?></label></td>
                        <td><label><?php echo $row->requestMessage; ?></label></td>
                        <td>
                            <button id="button">
                                <?php 
                                echo '<a href="#" class="edit">Details</a>'; ?>
                            </button>
                        </td> 
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>