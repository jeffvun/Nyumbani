<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings</title>
    <link rel="stylesheet" href="css/Application.css">
</head>

<body>
    <nav>

    </nav>
    <main>
        <div>
            <h3>Listings</h3>
        </div>
        <hr/>
        <div class="container">
            <table >
                <thead>
                    <tr class="title">
                        <td class="td_title">ListingID</td>
                        <td class="td_title">Description</td>
                        <td class="td_title">County</td>
                        <td class="td_title">Address</td>
                        <td class="td_title">Type</td>
                        <td class="td_title">Rent</td>
                        <!-- <td calss="td_title">Availability</td> -->
                        <td class="td_title">+More</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $listings_decoded = json_decode($listings);
                    foreach($listings_decoded as $row):?>    
                    <tr>
                        <td><label><?php echo $row->listingID; ?></label></td>
                        <td><label><?php echo $row->propertyDescription; ?></label></td>
                        <td><label><?php echo $row->propertyCounty; ?></label></td>
                        <td><label><?php echo $row->propertyPhysicalAddress; ?></label></td>
                        <td><label><?php echo $row->propertyType; ?></label></td>
                        <td><label><?php echo $row->propertyRent; ?></label></td>
                        
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