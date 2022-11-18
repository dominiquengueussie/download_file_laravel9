<!doctype html>
<html lang="en">

<head>
    <title>Comment importer une procédure</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12 m-auto">
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-dismiss="alert">×</button>
                                {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-dismiss="alert">×</button>
                                {{ Session::get('failed') }}
                            </div>
                        @endif

                        <div class="card-header">
                            <h3 class="card-title fw-bold"> Importer une prodédure </h3>
                        </div>

                        <div class="card-body">
                            <label for="titre"> Titre du fichier <span class="text-danger">*</span> </label>
                            <input type="text" name="titre"
                                class="form-control @error('titre') is-invalid @enderror mb-2">
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }} </div>
                            @enderror

                            <label for="file"> File <span class="text-danger">*</span> </label>
                            <input type="file" name="file"
                                class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                                <div class="invalid-feedback">{{ $message }} </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Upload </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white"><h3>Liste des procédures disponible</h3></div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichiers as $fichier)
                        <tr>
                            <td>{{ $fichier->id }}</td>
                            <td>{{ $fichier->titre }}</td>
                            <td><a class="btn btn-primary text-light"
                                    href="{{ url('download/' . $fichier->id) }}">Télécharger</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</body>

</html>
