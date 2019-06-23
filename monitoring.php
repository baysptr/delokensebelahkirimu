<!doctype html>
<html lang="en" class="h-100">
<head>
    <title>BAGUS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Monitoring File</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="monitoring.php">Monitoring</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Monitoring File</h1><hr/>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Label</th>
                <th scope="col" colspan="2" align="center" width="20%"><div class="btn btn-sm btn-block btn-primary" onclick="window.location='create_token.php'">Tambah</div></th>
            </tr>
            </thead>
            <tbody>
            <?php
                include "config.php";
                $no = 1;
                $exec = mysqli_query($conn, "select * from tokens order by tgl_update desc");
                while($data = mysqli_fetch_array($exec)){
            ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['label'] ?></td>
                        <td><a href="secret_mon.php?id_token=<?= $data['id'] ?>" class="btn btn-sm btn-block btn-warning">Lihat</a></td>
                        <td><a href="javascript:;" onclick="if(confirm('Apakah anda yakin akan hapus data ini?')===true){ window.location='del_token.php?id=<?= $data['id'] ?>'; }" class="btn btn-sm btn-block btn-danger">Hapus</a></td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">&copy; Bagus . 2019 - 2020</span>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
