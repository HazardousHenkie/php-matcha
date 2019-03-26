<?php
    include_once 'config/database.php';
    include_once 'objects/order.php';

    $db = new Database();

    if($_POST) {
        $amount = $_POST["amount"];

        $order = new Order();
        $res = $order->create($amount, $db);
        
        if ($res) {
            echo "Successfully inserted data";
        } else {
            echo "failed to insert data";
        }
    }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal col-md-6 col-md-offset-3">
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Amount</label>
        <div class="col-sm-10">
            <input type="text" name="amount"  class="form-control" id="amount" placeholder="Amount" />
        </div>
    </div>

    <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
</form>