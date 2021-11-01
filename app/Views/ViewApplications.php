<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <link rel="stylesheet" href="css/Application.css">
</head>

<body>
    <nav>

    </nav>
    <main>
        <div>
            <h3>Applications</h3>
        </div>
        <hr/>
        <div class="container">
            <table >
                <thead>
                    <tr class="title">
                        <td class="td_title">Name</td>
                        <td class="td_title">Mail</td>
                        <td class="td_title">Property</td>
                        <td class="td_title">Date of Application</td>
                        <td class="td_title">Details</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $applications_decoded = json_decode($ViewApplications);
                    foreach($applications_decoded as $row):?>    
                    <tr>
                        <td><label><?php echo $row->firstName; ?></label></td>
                        <td><label><?php echo $row->email; ?></label></td>
                        <td><label><?php echo $row->propertyDescription; ?></label></td>
                        <td><label><?php echo $row->application_date; ?></label></td>
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