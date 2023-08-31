<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row text-center">
            <div class="col">
            <div class="card py-7 p-3   ">
                <h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                    Anda Tidak Boleh Kesini!
                </h3>
                <p>Hallo, <b><?=$this->session->userdata('username')?></b> Anda tidak dikasih Authorizer untuk masuk kesini ya</p>
            </div>
            </div>
        </div>
    </div>
</main>