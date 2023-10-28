
<div>
    <h2>Change a bike's price</h2>
    <form id="bikeUpdateForm">
        <label>
            <input type="number" placeholder="bike id" id="bike_id"/>
        </label>
        <label>
            <input type="number" placeholder="update price" id="bike_price"/>
        </label>
        <button type="submit">submit</button>
    </form>
</div>

<script>
    document.getElementById("bikeUpdateForm").addEventListener("submit", (e) => {
        e.preventDefault();
        let bikeId = document.getElementById("bike_id").value;
        let bikePrice = document.getElementById("bike_price").value;
        let param = `bike_id=${bikeId}&bike_price=${bikePrice}`;
        fetch(`http://localhost:8080/crud/bike/put?${param}`, {
            method: "PUT",
            headers: {
                "Content-type": "application/json;charset=UTF-8"
            }
        }).then((r) => {
            r.json().then((v) => {
                // display data
                // document.getElementById("name").innerText = v['bike_name'];
                // document.getElementById("price").innerText = v['bike_price'];
                let bikeName = encodeURIComponent(v['bike_name']);
                let updatedPrice = encodeURIComponent(v['bike_price']);
                window.location.href = `/View/BikePutView?bike_name=${bikeName}&bike_price=${updatedPrice}`;
            })
        }).catch((err) => {
            console.error(err)
        })
    });
</script>

