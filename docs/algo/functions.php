<?php
/**
 * Fonction permettant de convertir des minutes en heure.
 * 
 * /!\ Ne pas modifier.
 * 
 */
function minutes_to_hours($minutes)
{
    return round($minutes / 60, 1);
}

/**
 * Fonction permettant d'afficher le résultat d'une estimation.
 * 
 * /!\ Ne pas modifier.
 * 
 */
function display_result($result)
{ ?>
    <style>
        .result {
            font-family: sans-serif;
        }

        td {
            border: 1px solid black;
            padding: 10px;
        }

        thead,
        .total {
            background: black;
            color: white;
        }

        .total td {
            font-weight: bold;
        }

        .specificities {
            background: grey;
            color: black;
        }
    </style>
    <div class="result">
        <h2>Résultat</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Temps</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result['lines'] as $line) : ?>
                    <tr>
                        <td><?= $line['name'] ?></td>
                        <td><?= minutes_to_hours($line['time']) ?>h</td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($result['lines'])) : ?>
                    <tr>
                        <td>Nom du dev ... </td>
                        <td>Temps du dev ici sous ce format : `4h`</td>
                    </tr>
                <?php endif; ?>
                <tr class="specificities">
                    <td>Spécificités</td>
                    <td>Temps additionnel</td>
                </tr>
                <?php foreach ($result['additional'] as $line) : ?>
                    <tr>
                        <td><?= $line['name'] ?></td>
                        <td><?= minutes_to_hours($line['time']) ?>h</td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($result['additional'])) : ?>
                    <tr>
                        <td>Nom spécificité (type de projet ou type de design)</td>
                        <td>Temps du dev ici sous ce format : `4h`</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot class="total">
                <tr>
                    <td>Total</td>
                    <td><?= minutes_to_hours($result['total']) ?>h</td>
                </tr>
            </tfoot>
        </table>
    </div>
<?php }
