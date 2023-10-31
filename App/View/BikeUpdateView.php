<?php
$pageName = "update bike";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . '/../htmlcss/HeadNavHeroView.php';
?>

<!-- HTML form for updating bike's price -->
<div>
    <h2>Change a bike's price</h2>
    <form id="bikeUpdateForm">
        <!-- Input for Bike ID -->
        <label>
            <input type="number" placeholder="bike id" id="bike_id"/>
        </label>
        <!-- Input for Updated Price -->
        <label>
            <input type="number" placeholder="update price" id="bike_price"/>
        </label>
        <!-- Submit Button -->
        <button type="submit">submit</button>
    </form>
</div>
<!-- Placeholder for displaying any errors -->
<div id="error"></div>

<script>
    // Listen for a 'submit' event on the form with ID 'bikeUpdateForm'
    document.getElementById("bikeUpdateForm").addEventListener("submit", (e) => {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Fetch the values for 'bike_id' and 'bike_price' from the form
        let bikeId = document.getElementById("bike_id").value;
        let bikePrice = document.getElementById("bike_price").value;

        // Create query parameters for the PUT request
        let param = `bike_id=${bikeId}&bike_price=${bikePrice}`;

        // Execute a PUT request to the specified URL with the parameters
        fetch(`http://localhost:8080/crud/bike/put?${param}`, {
            method: "PUT",
            headers: {
                "Content-type": "application/json;charset=UTF-8"
            }
        }).then((r) => {
            // If the PUT request is successful
            if (r.ok) {
                r.json().then((v) => {
                    // Option to redirect to another page to display updated data
                    let bikeName = encodeURIComponent(v['bike_name']);
                    let updatedPrice = encodeURIComponent(v['bike_price']);
                    window.location.href = `/View/BikePutView?bike_name=${bikeName}&bike_price=${updatedPrice}`;
                })
            } else {
                // If there's an error, display it in the 'error' div
                let errorDiv = document.getElementById("error");
                r.text().then((v) => {
                    errorDiv.innerHTML = v;
                })
            }
        }).catch((err) => {
            // Log any other errors to the console
            console.error(err)
        })
    });
</script>
