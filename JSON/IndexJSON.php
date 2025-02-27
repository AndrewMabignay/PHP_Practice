<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = '';
    $filename = "data.json";

    if (is_file($filename)):
        $data = file_get_contents($filename);
    endif;

    $json_arr = json_decode($data, true) ?? [];

    $json_arr[] = [
        'code' => $_POST['code'],
        'name' => $_POST['name']
    ];

    file_put_contents($filename, json_encode($json_arr, JSON_PRETTY_PRINT));
}

// Read JSON file
$items = [];
if (is_file("data.json")) {
    $items = json_decode(file_get_contents("data.json"), true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display JSON Data</title>
</head>
<body>
    <form action="IndexJSON.php" method="POST">
        <input type="text" name="code" placeholder="Enter Code" required>
        <input type="text" name="name" placeholder="Enter Name" required>
        <button type="submit">SUBMIT</button>
    </form>

    <div>
        <h3>Stored Items:</h3>
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <div>
                    <strong>Code:</strong> <?php echo htmlspecialchars($item['code']); ?><br>
                    <strong>Name:</strong> <?php echo htmlspecialchars($item['name']); ?>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No data available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
