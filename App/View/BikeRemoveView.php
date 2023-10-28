<div>
    <h2>Delete a bike</h2>
    <form id="bikeRemoveForm">
        <label>
            <input type="number" placeholder="bike id" id="bike_id"/>
        </label>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
    document.getElementById("bikeRemoveForm").addEventListener("submit", (e) => {
        e.preventDefault();
        let bikeId = document.getElementById("bike_id").value;
        let param = `bike_id=${bikeId}`;
        fetch(`http://localhost:8080/crud/bike/delete?${param}`, {
            method: "DELETE",
            headers: {
                "Content-type": "application/json;charset=UTF-8"
            }
        }).then(() => {
            // redirect to display all bike
            window.location.href = '/crud/bike/display';
        }).catch((err) => {
            console.error(err)
        })
    });
</script>

