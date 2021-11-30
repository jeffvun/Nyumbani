
# COMPLETED API ROUTES

[Go to deployed backend](https://nyumbanibackend.herokuapp.com/)

**Properties**

 - `/properties/?`
 >Gets properties belonging to single user
- `/addProperty`
<details>
 <summary>Request Body format</summary>
 
```json
{
        "ownerID": "2",
        "thumbnailPhoto": "test: path",
        "propertyType": "Villa",
        "propertyCounty": "Mombasa",
        "propertyPhysicalAddress": "Tempore maxime dolo",
        "propertyDescription": "Molestias culpa dolo",
        "propertyRent": "Est incidunt doloru",
        "otherImages": {
          "1": "pic1.jpg",
          "2": "pic2.jpg"
        },
        "dateBuilt": "24-12-2020",
        "videoLink": "https://youtu.be/dQw4w9WgXcQ",
        "propertySize": "15",
        "landSize": "22",
        "bedrooms": "5",
        "bathrooms": "2",
        "propertyFeatures": {
          
            "balcony":"1",
            "security":"0",
            "laundry":"0",
            "elevator":"0",
            "parking":"1"
         
        }
      }
```
  </details>

----
**Listings**

 - `/listings`
> Gets all listings
- `/listings/?`
>Gets single listing
- `listing/?`
>Gets listings belonging to specific owner

---
**Applications**

- `/applications/?`
>Gets properties belonging to single user

---
**Requests**

- `/requests/?`
>Gets all requests for a single property owner

---
**Transactions**

- `/payments/?`
>Gets payment history of a property
<details>
 <summary>Example:  /payments/10</summary>

  ```json
  {
    "propertyID": "10",
    "ownerID": "1",
    "tenantID": "6",
    "propertyDescription": "3 Bedroom Apartment in Nairobi",
    "propertyCounty": "Nairobi",
    "propertyPhysicalAddress": "Mzima Springs, Lavington",
    "propertyType": "Apartment",
    "thumbnailPhoto": "thumbnail1.jfif",
    "rentDueDate": "1",
    "dateRented": "2019-09-12",
    "tenantFirstName": "Steve",
    "tenantLastName": "Miller",
    "tenantEmail": "smiller@gmail.com",
    "payments": [
        {
            "paymentID": "1",
            "propertyID": "10",
            "senderID": "6",
            "recipientID": "1",
            "paymentMethod": "Rent",
            "paymentDate": "2021-11-01",
            "paymentAmount": "70000",
            "status": "Paid"
        },
        {
            "paymentID": "2",
            "propertyID": "10",
            "senderID": "6",
            "recipientID": "1",
            "paymentMethod": "Rent",
            "paymentDate": "2021-10-01",
            "paymentAmount": "70000",
            "status": "Paid"
        },
        {
            "paymentID": "3",
            "propertyID": "10",
            "senderID": "6",
            "recipientID": "2",
            "paymentMethod": "Rent",
            "paymentDate": "2021-09-01",
            "paymentAmount": "70000",
            "status": "Pending"
        }
    ],
    "rentStatus": "Overdue",
    "rentArrears": -1610000
}
  ```
  </details>
  
- `/payments/summary/?`
>Gets transaction summary of single property owner

<details>
  <summary>Example: /payments/summary/1</summary>

  ```json
  {
    "totalRentPaid-AllTime": 210000,
    "totalExpectedRent": 5088000,
    "monthlyExpectedRent": 284000,
    "monthRentReturn": 70000,
    "fromDate": "2019-09-12"
}
  ```
  </details>

