<?php
$pageName = "delete bike";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . '/../htmlcss/HeadNavHeroView.php';
?>

<!-- Begin a container for the bike deletion functionality -->
<div>
    <!-- Display a header indicating the purpose of this section -->
    <h2>Delete a bike</h2>

    <!-- Begin a form for deleting a bike by its ID -->
    <form id="bikeRemoveForm">
        <!-- A label wraps the input field for better accessibility -->
        <label>
            <!-- Input field to enter a bike's ID -->
            <input type="number" placeholder="bike id" id="bike_id"/>
        </label>

        <!-- Submit button for the form -->
        <button type="submit">Submit</button>
    </form>
</div>
<!-- Placeholder for displaying any errors -->
<div id="error"></div>

<script>
    // Attach an event listener to the bike removal form to capture its submission
    document.getElementById("bikeRemoveForm").addEventListener("submit", (e) => {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Retrieve the value of the bike ID from the input field
        let bikeId = document.getElementById("bike_id").value;

        // Construct the query parameter to pass the bike ID in the URL
        let param = `bike_id=${bikeId}`;

        // Send a DELETE request to the server to remove the specified bike
        fetch(`http://localhost:8080/crud/bike/delete?${param}`, {
            method: "DELETE",
            headers: {
                "Content-type": "application/json;charset=UTF-8"
            }
        }).then((r) => {
            if (r.ok) {
                window.location.href = '/crud/bike/display';
            } else {
                // If there's an error, display it in the 'error' div
                let errorDiv = document.getElementById("error");
                r.text().then((v) => {
                    errorDiv.innerHTML = v;
                });
            }
        }).catch((err) => {
            console.error(err);
        });
    });
</script>
