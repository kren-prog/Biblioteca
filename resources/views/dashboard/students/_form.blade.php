@csrf
@include('dashboard.partials.validation-error')

<div class="container d-flex py-4 justify-content-center">
    <div class="col-lg-6 mb-2 bg-light rounded-3">
        <div class="container-fluid py-3">
            <h4>
                <p style="color: #0069A3; text-align: center;">
                    Crear un nuevo estudiante

                </p>
            </h4>
            <div class="form-group">
                <div class="row center">
                    <div class="col mb-1">
                        <label for="code">Código:</label>

                        <input type="number" class="form-control" name="code" id="code" placeholder="" required>

                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name" required>

                        <label for="career">Carrera:</label>
                        <input type="text" class="form-control" name="career" id="career" required>

                        <label for="semester">Semestre:</label>
                        <input type="number" class="form-control" name="semester" id="semester" required>

                        <label for="phone">Celular:</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>

                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                <a href="{{ URL::previous() }}" class="btn btn-success btn-block">Cancelar</a>
            </div>
        </div>
    </div>
</div>
