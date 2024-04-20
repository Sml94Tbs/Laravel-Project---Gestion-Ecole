<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des élèves</title>
    <style>
        table{
            border-collapse: collapse;
        }
        th{
            border: 1px solid black;
            padding: 10px;
            font-weight: bold ;
        }
        td{
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>{{ $titre }} </h1>
    <h3>Date: {{ $date }} </h3>
    <p>
        <table>
            <tr> 
                <th> Nom </th> 
                <th> Prénom </th>
                <th> Date de naissance </th>
                <th> Email </th>
                <th> Classe </th>
            </tr>
            @foreach($eleves as $eleve)
            <tr> 
                <td> {{$eleve->nom }} </td> 
                <td> {{$eleve->prenom }} </td>
                <td> {{$eleve->dateNaiss }} </td>
                <td> {{$eleve->email }} </td>
                <td> {{$eleve->slug }} </td>
            </tr>
            @endforeach 
        </table>

    </p>
</body>
</html>
