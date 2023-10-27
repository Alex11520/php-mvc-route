<div>
    <h2>Change a bike's price</h2>
    <form id="bikeUpdateForm" action= "/crud/bike/put" method="PUT" >
        <label>
            <input type="number" placeholder="bike id" name="bike_id" />
        </label>
        <label>
            <input type="number" placeholder="update price" name="bike_price" />
        </label>
        <input type="submit" value="Submit" />
<!--        <input type="hidden" name="_METHOD" value="PUT"/>-->
    </form>
</div>
