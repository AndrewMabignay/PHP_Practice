<?php

abstract class Vehicle {
    protected $customerName, $vehicle, $rentalDays;

    abstract public function getCalculation();
}

class VehicleRental extends Vehicle {    
    public function setFields($customerName, $vehicle, $rentalDays) {
        $this->customerName = $customerName;
        $this->vehicle = $vehicle;
        $this->rentalDays = $rentalDays;
    }
    
    public function getCalculation()
    {
        $item = '';

        switch ($this->vehicle) {
            case 'Sedan':
                $item = 60;
                break;
        }

        return $item;
    }
}

$customerName = '';
$vehicle = '';
$rentalDays = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicleRental = new VehicleRental();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <div class="customer-name-container">
            <label for="Customer">Customer : </label>
            <input type="text" name="Customer" id="Customer">
        </div>

        <div class="vehicle-container">
            <label for="Vehicle">Vehicle : </label>
            <input type="text" name="Vehicle" id="Vehicle">
        </div>

        <div class="rental-days-container">
            <label for="RentalDays">Rental Days : </label>
            <input type="number" name="RentalDays" id="RentalDays">
        </div>

        <button type="submit">SUBMIT</button>
    </form>

    <?php if ($customerName == '' || $vehicle == '' || $rentalDays == 0) return; ?>

    <div class="container">
        <table>
            
    </div>

</body>
</html>