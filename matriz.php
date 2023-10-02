<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Matriz 10x5</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 30px;
            height: 30px;
            text-align: center;
            border: 1px solid black;
            cursor: pointer;
        }
        .disabled {
            background-color: gray;
        }
    </style>
</head>
<body>
    <h1>Matriz 10x5</h1>
    <table>
        <?php
        $matrix = [];
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                $matrix[$i][$j] = 0;
                echo "<td id='cell_$i$j' onclick='selectCell($i, $j)'>0</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        var selectedCells = 0;
        var maxSelections = 5;

        function selectCell(row, col) {
            var cell = document.getElementById(`cell_${row}${col}`);
            if (!cell.classList.contains('disabled') && selectedCells < maxSelections) {
                cell.classList.add('disabled');
                selectedCells++;
            }
        }
    </script>
</body>
</html>
