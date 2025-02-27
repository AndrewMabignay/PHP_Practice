<?php
    class Application {
        private $employeeName, $position, $baseSalary, $bonus;
        
        public function setFields($employeeName, $position, $baseSalary, $bonus) {
            $this->employeeName = $employeeName;
            $this->position = $position;
            $this->baseSalary = $baseSalary;
            $this->bonus = $bonus;
        }

        public function getEmployeeName() {
            return $this->employeeName;
        }

        public function getPosition() {
            return $this->position;
        }

        public function getBaseSalary() {
            return $this->baseSalary;
        }

        public function getBonus() {
            return $this->bonus;
        }
    }

    $employeeName = '';
    $position = '';
    $baseSalary = '';
    $bonus = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $employeeName = $_POST['EmployeeName'];
        $position = $_POST['Position'];
        $baseSalary = $_POST['BaseSalary'];
        $bonus = $_POST['Bonus'];

        $application = new Application();
        $application->setFields($employeeName, $position, $baseSalary, $bonus);
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
    <div class="container">
        <form action="" method="POST">
            <div class="employee-container">
                <label for="EmployeeName">Employee : </label>
                <input type="text" name="EmployeeName" id="EmployeeName">
            </div>

            <div class="employee-container">
                <label for="Position">Position : </label>
                <select name="Position" id="Position">
                    <option value=""></option>
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Web Developer">Web Developer</option>
                </select>
            </div>

            <div class="base-salary-container">
                <label for="BaseSalary">Base Salary : </label>
                <input type="number" name="BaseSalary" id="BaseSalary">
            </div>

            <div class="bonus-container">
                <label for="Bonus">Bonus : </label>
                <input type="number" name="Bonus" id="Bonus">
            </div>

            <button type="submit">SUBMIT</button>
        </form>
    </div>
    
    <?php if ($employeeName == '' || $position == '' || $baseSalary == '' || $bonus == '') return; ?>


    <table style="
        border: 1px solid lightgray;
        border-radius: 5px;
        border-collapse: collapse;
    ">
        <thead>
            <tr style="
                border: 1px solid black;
            ">
                <th>Employee Name</th>
                <th>Position</th>
                <th>Base Salary</th>
                <th>Bonus</th>
                <th>Total Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $application->getEmployeeName(); ?></td>
                <td><?php echo $application->getPosition(); ?></td>
                <td><?php echo $application->getBaseSalary(); ?></td>
                <td><?php echo $application->getBonus(); ?></td>
                <td><?php echo $application->getBaseSalary() + $application->getBonus(); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>