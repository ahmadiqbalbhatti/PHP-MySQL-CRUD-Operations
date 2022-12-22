<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Crud Operations</title>

    <style>
        .container-fluid {
            text-align: center;
        }

        h1 {
            text-align: center;
            color: cadetblue;
        }

        /*.my-container {*/
        /*    width: 60%;*/
        /*}*/

        .my-btn {
            background-color: cadetblue;
            border: none;
            padding: .75rem 3rem;
        }


        .my-btn:hover {
            background-color: cadetblue;
            border: none;
        }


    </style>
</head>
<body class="container-fluid">
<h1 class="my-3 mx-5">Lis of Users</h1>
<a href="./user.php">
    <button class="btn btn-primary my-btn align-content-lg-center my-2">Add New User</button>
</a>

<div class="container my-container">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Sr#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Password</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            $connection = new mysqli('localhost', 'root', '', 'crud-operation');

            if (!$connection) {
                die(mysqli_error($connection));
            }

            $sqlReadQuery = "SELECT * FROM `crud`";
            $result = mysqli_query($connection, $sqlReadQuery);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $password = $row['password'];
                    echo '
                    <th scope="row">' . $id . '</th>
                    <td>' . $name . '</td>
                    <td>' . $email . '</td>
                    <td>' . $mobile . '</td>
                    <td>' . $password . '</td>
                    <td>
                        <button class="btn btn-primary"><a class="text-decoration-none link-light" href="update.php?updateId='.$id.'">Update </a></button>
                        <button class="btn btn-primary"><a class="text-decoration-none link-light" href="delete.php?deleteid=' . $id . '">Delete </a></button>
                    </td>
                    </tr>
                    ';
                }
            }
            ?>


        </tr>
        </tbody>
    </table>
</div>
</body>
</html>