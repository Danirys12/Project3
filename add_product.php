
<HTML>

<a href='logout.php'>logout</a><br>
<br>
<font size=4><b>Add product</b></font>
<form name="input" action="insert_product.php" method="post" required="required">
Product Name: <input type="text" name="name"required="required">

<br> description: <input type="text" name="description"required="required">

<br> Cost: <input type="text" name="cost"required="required">

<br> Sell Price: <input type="text" name="sell_price"required="required">

<br> Quantity: <input type="text" name="quantity"required="required">

<br>Select a vendor: <SELECT name='vendor_id'>
<option value=1001> AAA </option>
<option value=1002> BBB </option>
<option value=1003> CCC </option>
<option value=1004> XYZ </option>
</SELECT>
<br>
<input type='submit' value='Submit'>

</form>
</HTML>
 


