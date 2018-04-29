<form action="#" method="POST">
    <fieldset>
        <label>Sort By:</label>
        <select name="sortBy">
            <option value="None">None</option>
  <option value="id">ID #</option>
  <option value="corp">Corportation</option>
  <option value="email">Email</option>
  <option value="incorp_dt">Date</option>
  <option value="zipcode">Zipcode</option>
  <option value="owner">Owner</option>
  <option value="phone">Phone #</option>
</select>
        <input type="radio" name="sortOrder" value="ASC" checked="checked"/>Ascending
        <input type="radio" name="sortOrder" value="DESC" />Descending
    </fieldset>