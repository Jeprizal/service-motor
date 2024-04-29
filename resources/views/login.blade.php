@extends('layout.main')

@section('container')
    <br />
    <br />
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin w-100 m-auto">

                <form action="/login" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
                    @if (session()->has('errorLogin'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('errorLogin') }}
                        </div>
                    @endif
                    @if (session()->has('pesan'))
                        <div class="alert alert-success" role="alert">
                            {{ session('pesan') }}
                        </div>
                    @endif
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" placeholder="name@example.com" autofocus>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button><br />
                    <p>Belum punya akun ? <a href="/daftar"> Daftar sekarang</a></p>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2022</p>
                </form>
            </main>
        </div>
    </div>
@endsection
