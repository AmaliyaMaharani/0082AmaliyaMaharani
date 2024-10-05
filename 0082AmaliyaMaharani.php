<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Diskon Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5e3d3; 
            margin: 0;
            padding: 0;
        }
        .container0082 {
            max-width: 600px;
            margin: 50px auto;
            background-color: #800000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            color: #fff; 
        }
        h1 {
            text-align: center;
            color: #fff;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            color: #fff;
        }
        input[type="text"], select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4d0000; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #b30000; 
        }
        .result0082 {
            padding: 10px;
            background-color: #f5e3d3; 
            color: #800000;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
        }
        .hidden {
            display: none;
        }
    </style>
    <script>
        
        function hideResult() {
            setTimeout(function() {
                const resultDiv = document.querySelector('.result0082');
                if (resultDiv) {
                    resultDiv.classList.add('hidden');  
                }
            }, 6000);  
        }
    </script>
</head>
<body>

<div class="container0082">
    <h1>Hitung Diskon Belanja</h1>
    <form method="POST">
        <label for="total_belanja0082">Total Belanja (Rp):</label>
        <input type="text" id="total_belanja0082" name="total_belanja0082" required>

        <label for="is_member0082">Apakah Anda Member?</label>
        <select id="is_member0082" name="is_member0082">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>

        <input type="submit" value="Hitung Diskon" onclick="hideResult()">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $total_belanja0082 = $_POST['total_belanja0082'];
        $is_member0082 = $_POST['is_member0082'];

        
        function hitungDiskon0082($total_belanja0082, $is_member0082) {
            $diskon0082 = 0;
            $diskon_member0082 = $total_belanja0082 - 0.10 * $total_belanja0082;

            if ($is_member0082) {
                
                if ($total_belanja0082 > 1000000) {
                    $diskon0082 = 0.10 * $total_belanja0082 + 0.15 * $diskon_member0082;
                } elseif ($total_belanja0082 >= 500000) {
                    $diskon0082 = 0.10 * $total_belanja0082 + 0.10 * $diskon_member0082;
                } else {
                    $diskon0082 = $diskon_member0082;
                }
            } else {
                
                if ($total_belanja0082 > 1000000) {
                    $diskon0082 = 0.10 * $total_belanja0082;
                } elseif ($total_belanja0082 >= 500000) {
                    $diskon0082 = 0.05 * $total_belanja0082;
                }
            }

            
            $total_bayar0082 = $total_belanja0082 - $diskon0082;
            return array('total_belanja0082' => $total_belanja0082, 'diskon0082' => $diskon0082, 'total_bayar0082' => $total_bayar0082);
        }

        
        $result0082 = hitungDiskon0082($total_belanja0082, $is_member0082);

        
        echo "<div class='result0082'>";
        echo "Total Belanja: Rp " . number_format($result0082['total_belanja0082'], 0, ',', '.') . "<br>";
        echo "Diskon: Rp " . number_format($result0082['diskon0082'], 0, ',', '.') . "<br>";
        echo "Total Bayar: Rp " . number_format($result0082['total_bayar0082'], 0, ',', '.');
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
