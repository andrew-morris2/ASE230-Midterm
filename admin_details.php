<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'admin') {
    header("Location: welcome.php");
    exit();
}

$id = $_GET['id'];


$jsonFile = 'data/midtermdata.json';
$jsonData = file_get_contents($jsonFile);
$clothingItems = json_decode($jsonData, true);


$itemDetails = null;

foreach ($clothingItems as $item) {
    if ($item['ID'] == $id) {
        $itemDetails = $item;
        break;
    }
}

// Check if itemDetails is found
if (!$itemDetails) {
    echo "<h1>Item not found.</h1>";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemDetails['name'] = htmlspecialchars(trim($_POST['name']));
    $itemDetails['price'] = htmlspecialchars(trim($_POST['price']));
    $itemDetails['description'] = htmlspecialchars(trim($_POST['description']));
    $itemDetails['image'] = htmlspecialchars(trim($_POST['image'])); // If you want to allow changing the image

    // Update the JSON data
    foreach ($clothingItems as &$item) {
        if ($item['ID'] == $id) {
            $item = $itemDetails;
            break;
        }
    }

    // Write the updated data back to the JSON file
    file_put_contents($jsonFile, json_encode($clothingItems, JSON_PRETTY_PRINT));
    header("Location: admin.php"); // Redirect back to admin page after update
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit <?= htmlspecialchars($itemDetails['name']) ?> - Vogue Vault</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Edit Product Details</h1>
    <form action="" method="POST">
        <div>
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($itemDetails['name']) ?>" required>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" name="price" value="<?= htmlspecialchars($itemDetails['price']) ?>" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($itemDetails['description']) ?></textarea>
        </div>
        <div>
            <label for="image">Image URL</label>
            <input type="text" id="image" name="image" value="<?= htmlspecialchars($itemDetails['image']) ?>">
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="admin.php">Back to Admin Dashboard</a>
</body>
</html>