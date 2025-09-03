 <?php
echo "<h2>File Check</h2>";

$files_to_check = [
    'register.php',
    'index.html', 
    'db.php',
    'setup_database.php',
    'login.php'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        echo "<p style='color: green;'>✓ $file exists</p>";
    } else {
        echo "<p style='color: red;'>✗ $file is MISSING</p>";
    }
}

echo "<h3>All files in folder:</h3>";
$all_files = scandir(__DIR__);
foreach ($all_files as $file) {
    if ($file != '.' && $file != '..') {
        echo $file . "<br>";
    }
}
?>