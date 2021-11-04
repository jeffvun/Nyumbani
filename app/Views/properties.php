<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
</head>

<body>
    <h1>These are your properties</h1>


    <?php $properties_decoded = json_decode($properties);
    foreach($properties_decoded as $property):?>

    <div style="background: pink; width: 500px; margin:50px">
        <img src="<?=base_url('uploads/images/properties/'.$property->thumbnailPhoto)?>"
            alt='uploads/images/properties/<?= $property->thumbnailPhoto?>' width="500">

        <div>
            <h2>Status: <?php $status = $property->availability==1?"Vacant": "Occupied"; echo $status; ?></h2>
            <h3>Generated Title: <span style="color: green">
                    <?=$property->bedrooms." bedroom ".$property->propertyType." in ".$property->propertyCounty ?></span>
            </h3>
            <h4>ID = <?= $property->propertyID?></h4>
        </div>

        <div>
            <button type="button" onclick="show()">Details</button>
        </div>

    </div>

    <!--****************************DETAILS************************************-->

    <div class="details" style="background:grey; border:2px black solid; width:500px; display:none">
        <h3 style="color:white">Details</h3>
        <ul>
            <li>Type: <?= $property->propertyType?></li>
            <li>Rent: <?= $property->propertyRent?></li>
            <li>County: <?= $property->propertyCounty ?></li>
            <li>Physical Address: <?= $property->propertyPhysicalAddress ?></li>
            <li>Description: <?= $property->propertyDescription ?></li>
        </ul>
        <?php  if($property->propertyFeatures != null):?>
        <?php foreach(json_decode($property->propertyFeatures) as $feature=>$val): ?>
        <?php if ($val == 1){
                echo "<p style='color:yellow'>".$feature."<p>";
            } ?>
        <?php endforeach; ?>
        <?php endif;?>

        <div style="background: green">
            <h3 style="color:white">Tenant</h3>
            <ul>
                <li>Name: <?= $property->firstName." ".$property->firstName ?></li>
                <li>Email: <?= $property->email ?></li>
            </ul>

        </div>

        <div style="background:white">
            <?php  if($property->otherImages != null):?>

            <?php foreach(json_decode($property->otherImages) as $pic): ?>
            <img src="uploads/images/properties/<?= $pic?>" width="200">
            <?php endforeach; ?>
            <?php endif;?>
            <h3>Video: <a target="_blank" href="<?=$property->videoLink ?>"><?=$property->videoLink ?></a></h3>

        </div>
        <div>
            <button type="button" onclick="hide()">HIDE</button>
        </div>
    </div>

    <?php endforeach; ?>







</body>

<script>
function show() {
    document.querySelectorAll(".details").forEach(a => a.style.display = "block");
}

function hide() {
    document.querySelectorAll(".details").forEach(a => a.style.display = "none");
}
</script>

</html>