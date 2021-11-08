<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Property 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <h1>Add Property</h1>
      <hr>
      <h2>General</h2>
      <hr>
      <form class="addpropertyform mb-3" method="post">
        <div class="mb-3">
          <label for="thumbnailphoto" class="form-label">Add Thumbnail Photo</label>
          <input class="form-control" name="thumbnailphoto" type="file" id="thumbnailphoto">
        </div>
        <div class="mb-3">
          <label for="propertyType" class="form-label">Property Type</label>
          <select class="form-select" name="propertyType" aria-label="Default select example">
            <option selected></option>
            <option value="Apartment">Apartment</option>
            <option value="Maisonette">Maisonette</option>
            <option value="Villa">Villa</option>
            <option value="Bungalow">Bungalow</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="propertyCounty" class="form-label">County</label>
          <select class="form-select" name="propertyCounty" aria-label="Default select example">
            <option selected></option>
            <option value="Nakuru">Nakuru</option>
            <option value="Nairobi">Nairobi</option>
            <option value="Mombasa">Mombasa</option>
            <option value="Kisumu">Kisumu</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="propertyPhysicalAddress" class="form-label">Physical Address</label>
          <input type="text" class="form-control" name="propertyPhysicalAddress" id="propertyPhysicalAddress" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="propertyDescription" class="form-label">Description</label>
          <textarea type="text" class="form-control" name="propertyDescription" id="propertyDescription" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="propertyRent" class="form-label">Rent</label>
          <input type="text" class="form-control" name="propertyRent" id="propertyRent">
        </div>
        <h2>Multimedia (Optional)</h2>
      <hr>
        <div class="mb-3">
          <label for="additionalphotos" class="form-label">Add Photos</label>
          <input class="form-control" name="additionalphotos" type="file" id="additionalphotos" multiple>
        </div>
        <div class="mb-3">
          <label for="link" class="form-label">Video</label>
          <input type="url" name="link" class="form-control" id="propertytype" aria-describedby="emailHelp" placeholder="Paste Youtube/Vimeo link">
        </div>
        <div class="mb-3">
          <label for="propertySize" class="form-label">Property Size</label>
          <input class="form-control" name="propertySize" type="number" id="propertySize">
        </div>
        <div class="mb-3">
          <label for="landsize" class="form-label">Land Size</label>
          <input type="number" class="form-control" name="landsize" id="landsize" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="bedrooms" class="form-label">Rooms</label>
          <select class="form-select" name="bedrooms" aria-label="Default select example">
            <option selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="bathrooms" class="form-label">Bathrooms</label>
          <select class="form-select" name="bathrooms" aria-label="Default select example">
            <option selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
        </div>
        <h2>Additional Amenities & Services</h2>
        <hr>
        <div class="mb-3">
          <input type="checkbox" name="balcony" class="btn-check btn-check-inline" id="balcony" autocomplete="off">
          <label class="btn btn-outline-primary" for="balcony">Balcony</label>
          <input type="checkbox" name="security" class="btn-check btn-check-inline" id="security" autocomplete="off">
          <label class="btn btn-outline-primary" for="security">Security</label>
          <input type="checkbox" name="laundry" class="btn-check btn-check-inline" id="laundry" autocomplete="off">
          <label class="btn btn-outline-primary" for="laundry">Laundry</label>
        </div>
        <div class="mb-3">
          <input type="checkbox" name="elevator" class="btn-check btn-check-inline" id="elevator" autocomplete="off">
          <label class="btn btn-outline-primary" for="elevator">Elevator</label>
          <input type="checkbox" name="parking" class="btn-check btn-check-inline" id="parking" autocomplete="off">
          <label class="btn btn-outline-primary" for="parking">Parking</label>
          <input type="checkbox" name="wheelchair" class="btn-check btn-check-inline" id="wheelchair" autocomplete="off">
          <label class="btn btn-outline-primary" for="wheelchair">Wheelchair Accessible</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class=" container card mb-4" style="width: 18rem">
      <div class="card-body">
        <h5 class="card-title">Form Data</h5>
        <h6 class="card-subtitle mb-2 text-muted">Form data has been converted into the following JSON</h6>
        <pre><code class="displayresults"></code></pre>
      </div>
    </div>
    <script src="../assets/js/formToJSON.js"></script>
  </body>
</html>
