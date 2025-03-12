<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knapsack</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a0d8ef;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #064b9a;
            color: orange;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            position: relative;
        }
        .top-right {
            position: absolute;
            top: 15px;
            right: 20px;
        }
        .top-right button {
            background: yellow;
            border: none;
            padding: 5px 10px;
            margin-left: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .filter {
            text-align: center;
            margin: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 900px;
            margin: auto;
        }
        .item {
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }
        .item img {
            width: 50px;
            height: 50px;
        }
        .item .badge {
            position: absolute;
            top: -5px;
            left: -5px;
            background: red;
            color: white;
            padding: 5px;
            border-radius: 50%;
            font-weight: bold;
        }
        .footer {
            background-color: green;
            color: yellow;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">Knapsack 
        <span class="top-right">
            <button>Inscription</button>
            <button>Connexion</button>
        </span>
    </div>
    <div class="filter">
        Trier par: 
        <input type="checkbox" checked> Armures
        <input type="checkbox" checked> Armes
        <input type="checkbox" checked> Munitions
        <input type="checkbox" checked> Nourritures
        <input type="checkbox" checked> Médicaments
    </div>
    <div class="grid">
        <div class="item"><span class="badge">2</span><img src="fishing_rod.png"><br>Fishing rod<br>⚖ 10 lbs<br>💰 3 caps</div>
        <div class="item"><span class="badge">2</span><img src="strawberry.png"><br>Fraise<br>⚖ 1 lbs<br>💰 2 caps</div>
        <div class="item"><span class="badge">2</span><img src="soda.png"><br>Soda<br>⚖ 3 lbs<br>💰 8 caps</div>
        <div class="item"><span class="badge">2</span><img src="tea.png"><br>Thé vert<br>⚖ 1 lbs<br>💰 2 caps</div>
        <div class="item"><span class="badge">2</span><img src="cowboy_hat.png"><br>Chapeau de cowboy<br>⚖ 3 lbs<br>💰 7 caps</div>
        <div class="item"><span class="badge">2</span><img src="cheese.png"><br>Bloc de fromage<br>⚖ 2 lbs<br>💰 5 caps</div>
    </div>
    <div class="footer">Réalisé par ModCrabs</div>
</body>
</html>
