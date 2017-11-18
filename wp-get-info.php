
<?php
//Codigo para consultar el número de pedidos de cada artículo.
//Consulta en un query.

$query = "SELECT order_item_name, count(*) FROM wp_woocommerce_order_items GROUP BY order_item_name";

//response tras la consulta a la base de datos. 

$response = @mysqli_query($dbc, $query);

//Al haber response, imprimimos una tabla con la informacion solicitada. 

if($response){
echo '<table align="left" cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Item name</b></td>
<td align="left"><b>Total</b></td></tr>';

while($row = mysqli_fetch_array($response)){

	echo '<tr><td align="left">' . 
	$row['order_item_name'] . '</td><td align="left">' . 
	$row['count(*)'] . '</td><td align="left">';

	echo '</tr>';
}
echo '</table>';
}
else{
echo "Query failed";

echo mysqli_error($dbc);
}

?>
