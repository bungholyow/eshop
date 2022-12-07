@extends('auth.backend.layouts.head')

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="ex-page-content text-center">
                                <h1>401!</h1>
                                <h3>Sorry, access denied</h3><br>

                                <a class="btn btn-info mb-5 waves-effect waves-light" href="javascript:history.back()">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>