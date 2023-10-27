<div>
    <h2>Add a new bike</h2>
    <form id="bikeCreateForm" action= "/crud/bike/post" method="POST" >
        <label>
            <input type="text" placeholder="bike name" name="bike_name" />
        </label>
        <label>
            <input type="number" placeholder="bike price" name="bike_price" />
        </label>
        <input type="submit" value="Submit" />
    </form>
</div>