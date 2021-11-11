<div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                Formulario Carrera
            </div>
            <div class="card-body">
                @include("livewire.carrera.$view")
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                    Lista de Carreras
                </div>
            <div class="card-body">
                @include('livewire.carrera.table')
            </div>
        </div>
    </div>
</div>
