
<?php
//Codigo para consultar el número de lineas (tanto articulos como tasas
// de envío) que tiene cada pedido. 

//Consulta en un query.

$query = "SELECT order_id, count(*) FROM wp_woocommerce_order_items GROUP BY order_id";

//response tras la consulta a la base de datos. 

$response = @mysqli_query($dbc, $query);

//Al haber response, imprimimos una tabla con la informacion solicitada. 

if($response){
echo '<table align="left" cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Item id</b></td>
<td align="left"><b> Total de lineas </b></td></tr>';

while($row = mysqli_fetch_array($response)){

	echo '<tr><td align="left">' . 
	$row['order_id'] . '</td><td align="left">' . 
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
