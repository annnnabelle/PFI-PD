<?php 
    require 'partials/header.php'; 
?>

<main>
    <div class="filter">
        Trier par: 
        <input type="checkbox"> Armures
        <input type="checkbox"> Armes
        <input type="checkbox"> Munitions
        <input type="checkbox"> Nourritures
        <input type="checkbox"> Médicaments
    </div>
    <div class="grid">
    <table>
        <tr style="align-items: flex-start;">
            <td style="width: 25%;">    
                <a href="/" class="item">
                    <span class="badge">2</span>
                    <img src="/public/img/FishingRod" alt="Fishing Rod"> 
                    <div style="display: inline-block; font-size: 25px;">
                        <div style="padding:3px; font-weight: bold;">TITRE</div>
                        <div style="padding:1px;">
                            <img style="height:20px; width: 20px; vertical-align: middle;" src="/public/img/weight">
                            <span style="line-height: 25px; vertical-align: middle;">POIDS lbs</span>
                        </div>
                        <div style="padding:1px;">
                            <img style="height:20px; width: 20px; vertical-align: middle;" src="/public/img/gold">
                            <span style="line-height: 25px; vertical-align: middle;">PRIX gold</span>
                        </div>
                    </div>
                </a>
            </td>
            <td style="width: 25%;">
                <a href="/" class="item">
                    <span class="badge">2</span>
                    <img src="/public/img/FishingRod" alt="Fishing Rod"> 
                    <div style="display: inline-block; font-size: 25px;">
                        <div style="padding:3px; font-weight: bold;">TITRE</div>
                        <div style="padding:1px;">
                            <img style="height:20px; width: 20px; vertical-align: middle;" src="/public/img/weight">
                            <span style="line-height: 25px; vertical-align: middle;">POIDS lbs</span>
                        </div>
                        <div style="padding:1px;">
                            <img style="height:20px; width: 20px; vertical-align: middle;" src="/public/img/gold">
                            <span style="line-height: 25px; vertical-align: middle;">PRIX gold</span>
                        </div>
                    </div>
                </a>
            </td>
        </tr>
    </table>
    </div>

</main>

<?php require 'partials/footer.php'; ?>
