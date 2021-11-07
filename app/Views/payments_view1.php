<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database | View </title>
</head>
<body>
    <h1> Fetch Data </h1>
    <span>Search</span>
    <input type="text" placeholder="Search Here" />
    <br><br>
    <table>
        <tr colspan="3">
            <th>Payment Id</th>
            <th>Property ID</th>
            <th>Sender ID</th>
            <th>Recipient ID</th>
            <th>Payment Method</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
        <?php 
            if (count($fetch_data) >0 ) { 
                foreach ($fetch_data as $row) {
                    ?>
                    <tr colspan="3">
                        <td><?php echo $row->paymentID ;?></td>
                        <td><?php echo $row->propertyID ;?></td>
                        <td><?php echo $row->senderID ;?></td>
                        <td><?php echo $row->recipientID ;?></td>
                        <td><?php echo $row->paymentMethod ;?></td>
                        <td><?php echo $row->paymentDate ;?></td>
                        <td><?php echo $row->paymentAmount ;?></td>
                        <td></td>
                        
                    </tr>
            <?php
                }
            }
            else {
                ?>
                <tr>
                    <td colspan="3"> No Data Found</td>
                </tr>
        <?php
            }
         ?>
    </table>
</body>
</html>