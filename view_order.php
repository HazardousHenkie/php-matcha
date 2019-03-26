<?php
    include_once 'config/database.php';
    include_once 'objects/order.php';
    
    $db = new Database;
    $order = new Order;

    $res = $order->read($db);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Matcha PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>Order number</th>
				<th>Order date</th>
				<th>Amount</th>
				<th>Customer ID</th>
			</tr>
            <?php 
			while($r = mysqli_fetch_assoc($res)){
			?>
			<tr>
				<td><?php echo $r['order_id']; ?></td>
				<td><?php echo $r['order_date'] ?></td>
				<td><?php echo $r['amount']; ?></td>
				<td><?php echo $r['customer_id']; ?></td>
				<td><a href="update_order.php?id=<?php echo $r['order_id']; ?>">Edit</a> <a href="delete_order.php?id=<?php echo $r['order_id']; ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>