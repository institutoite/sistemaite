

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Billete</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('billetes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Billete200:</strong>
                            {{ $billete->billete200 }}
                        </div>
                        <div class="form-group">
                            <strong>Billete100:</strong>
                            {{ $billete->billete100 }}
                        </div>
                        <div class="form-group">
                            <strong>Billete50:</strong>
                            {{ $billete->billete50 }}
                        </div>
                        <div class="form-group">
                            <strong>Billete20:</strong>
                            {{ $billete->billete20 }}
                        </div>
                        <div class="form-group">
                            <strong>Billete10:</strong>
                            {{ $billete->billete10 }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda5:</strong>
                            {{ $billete->moneda5 }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda2:</strong>
                            {{ $billete->moneda2 }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda1:</strong>
                            {{ $billete->moneda1 }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda50:</strong>
                            {{ $billete->moneda50 }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda20:</strong>
                            {{ $billete->moneda20 }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda10:</strong>
                            {{ $billete->moneda10 }}
                        </div>
                        <div class="form-group">
                            <strong>Dolares100:</strong>
                            {{ $billete->dolares100 }}
                        </div>
                        <div class="form-group">
                            <strong>Dolares50:</strong>
                            {{ $billete->dolares50 }}
                        </div>
                        <div class="form-group">
                            <strong>Dolares20:</strong>
                            {{ $billete->dolares20 }}
                        </div>
                        <div class="form-group">
                            <strong>Dolares10:</strong>
                            {{ $billete->dolares10 }}
                        </div>
                        <div class="form-group">
                            <strong>Dolares5:</strong>
                            {{ $billete->dolares5 }}
                        </div>
                        <div class="form-group">
                            <strong>Dolares1:</strong>
                            {{ $billete->dolares1 }}
                        </div>
                        <div class="form-group">
                            <strong>Pagable Id:</strong>
                            {{ $billete->pagable_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pagable Type:</strong>
                            {{ $billete->pagable_type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
