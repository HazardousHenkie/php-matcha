<?php
    include_once 'objects/customer.php';

    class Order {
        private $order;

        public $order_date;
        public $amount;
        public $customer_id;

        private function getUserId() {
            $customer = new Customer;
            $customer_id = $customer->get_username();

            return $customer_id;
        }

        private function runQuery($sql, $database) {
            $res = $database->run_query($sql);
           
            if($res) {
                return true;
            } else {
                return false;
            }
        }

        public function create($amount, $database) {
            $customer_id = $this->getUserId();

            $sql = "INSERT INTO `orders` (amount, customer_id) VALUES ('$amount', '$customer_id')";

            $res = $this->runQuery($sql, $database);
            return $res;
        }
        
        public function read($database) {
            $sql = "SELECT * FROM `orders`";
            
            $res = $database->get_data($sql);
           
            return $res;
        }

        public function update($amount, $id, $database) {
    		$sql = "UPDATE `orders` SET amount='$amount' WHERE order_id=$id";
            
            $res = $this->runQuery($sql, $database);
            return $res;
        }

        public function delete($id, $database) {
            $sql = "DELETE FROM `orders` WHERE order_id=$id";
            
            $res = $this->runQuery($sql, $database);
            return $res;
        }
    }

?>