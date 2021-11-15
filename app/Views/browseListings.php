<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PROPERTY LISTINGS</title>
    <link rel="stylesheet" type="text/css" href="listings.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">

    <style>
    * {

        margin: 0;
        padding: 0;
        font-family: "Tangerine", serif;
        box-sizing: border-box;
    }

    h1 {

        text-align: center;
        color: rgb(107, 10, 15);
        padding: 15px;
        background-color: #eeebf3;

    }

    nav {

        background-color: #FFB6C1;
        display: grid;
        place-items: center;

    }

    nav ul {

        list-style-type: none;

    }

    nav ul a {

        display: inline-block;
        padding: 15px;
        text-decoration: none;
        transition: width 4s, ease-in-out;
        font size: 15px;

    }


    .search-wrapper {

        display: flex;
        align-items: center;
        justify-content: right;
        /*background-color: transparent;*/
    }

    .search-wrapper form {
        border: 1px solid #000;
        border-radius: 10px;
    }

    .search-wrapper input {
        outline: none;
        border: none;
        appearance: none;
    }

    .items {

        display: inline-grid;
        grid-template-columns: repeat(4, 1fr);
        padding: 30px 20px;
        grid-column-gap: 20px;
        grid-row-gap: 30px;

    }

    .item img {

        width: 100%;
        height: 300px;
        object-fit: cover;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .item img:hover {

        transform: scale(1.04);
        transition: ease-in-out;

    }

    .item h3 {

        padding: 5px;
        text-align: center;
    }

    .item button,
    button {

        padding: 5px 30px;
        border: none;
        outline: none;
        background-color: rgb(59, 3, 3);
        color: white;
        cursor: pointer;
        border-radius: 4px;
        font-size: 15px;
        transition: 0.2s all;
        position: relative;
        top: 10px;
    }

    .buttons button {

        padding: 5px 30px;
        border: none;
        outline: none;
        background-color: rgb(215, 226, 230);
        color: rgb(59, 3, 3);
        cursor: pointer;
        border-radius: 4px;
        font-size: 15px;
        transition: 0.2s all;
        position: relative;
        top: 10px;
    }

    .item button:hover {

        transform: scale(1.04);
    }

    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    @media screen and (max-width: 1000px) {
        .items {
            grid-template-columns: repeat(2, 1fr);
        }

        @media screen and (max-width: 750px) {
            .items {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>

</head>

<body>
    <h1>VIEW LISTINGS</h1><br><br>

    <nav>
        <div class="buttons">
            <ul>
                <a href="">
                    <li><button>Balcony</button></li>
                </a>
                <a href="">
                    <li><button>Security</button></li>
                </a>
                <a href="">
                    <li><button>Laundry</button></li>
                </a>
                <a href="">
                    <li><button>Parking</button></li>
                </a>
                <a href="">
                    <li><button>Elevator</button></li>
                </a>
            </ul>
        </div>
    </nav>

    <section class="items">

        <?php $listings2 = json_decode($listings);
        foreach ($listings2 as $i=>$listing): ?>
        <div class="item">
            <img src="<?=base_url('uploads/images/properties/'.$listing->thumbnailPhoto)?>">
            <h3><?= $listing->propertyDescription?></h3>
            <button type="button" onclick="show()">Details</button>

        </div>


        <!--****************************DETAILS************************************-->

        <div class="card details" style="border:2px black solid; width:500px; display:none">
            <div class="card">
                <h3 style="color:white">Details</h3>
                <ul>
                    <li>Type: <?= $listing->propertyType?></li>
                    <li>Rent: <?= $listing->propertyRent?></li>
                    <li>County: <?= $listing->propertyCounty ?></li>
                    <li>Physical Address: <?= $listing->propertyPhysicalAddress ?></li>
                    <li>Description: <?= $listing->propertyDescription ?></li>
                </ul>
                <?php  if($listing->propertyFeatures != null):?>
                <?php foreach(json_decode($listing->propertyFeatures) as $feature=>$val): ?>
                <?php if ($val == 1){
                echo "<p style='color:red'>".$feature."<p>";
            } ?>
                <?php endforeach; ?>
                <?php endif;?>
            </div>

            <div class="card" style="background: rgb(18, 194, 145)">
                <h3 style="color:white">Land Lord</h3>
                <ul>
                    <li>Name: <?= $listing->firstName." ".$listing->firstName ?></li>
                    <li>Email: <?= $listing->email ?></li>
                </ul>

            </div>

            <div style="background:white">
                <?php  if($listing->otherImages != null):?>

                <?php foreach(json_decode($listing->otherImages) as $pic): ?>
                <img src="uploads/images/properties/<?= $pic?>" width="200">
                <?php endforeach; ?>
                <?php endif;?>
                <h3>Video: <a target="_blank" href="<?=$listing->videoLink ?>"><?=$listing->videoLink ?></a></h3>

            </div>

            <button type="button" onclick="hide()">HIDE</button>

        </div>

        <?php endforeach;?>

    </section>

</body>

</html>

<script>
function show() {
    document.querySelectorAll(".details").forEach(a => a.style.display = "block");
}

function hide() {
    document.querySelectorAll(".details").forEach(a => a.style.display = "none");
}
</script>