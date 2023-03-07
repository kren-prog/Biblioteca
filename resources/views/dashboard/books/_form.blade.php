@csrf
@include('dashboard.partials.validation-error')

    <div class="container d-flex py-4 justify-content-center">
        <div class="col-lg-6 mb-2 bg-light rounded-3">
            <div class="container-fluid py-3">
                <h4> 
                    <p style="color: #0069A3; text-align: center;">
                        Crear un nuevo libro
                        
                    </p>
                </h4>
                <div class="form-group">
                    <div class="row center">
                        <div class="col mb-1">
                            <label for="code">Código:</label>

                            <input type="number" class="form-control" name="code" id="code"
                                placeholder="" required>

                            <label for="title">Titulo:</label>
                            <input type="text" class="form-control" name="title" id="title" required>

                            <label for="author">Autor:</label>
                            <input type="text" class="form-control" name="author" id="author" required>

                            <label for="genre">Genero:</label>
                            <input type="text" class="form-control" name="genre" id="genre" required>

                            <label for="year">Año publicación:</label>
                            <input type="number" class="form-control" name="year" id="year" required>

                            <label for="availability">Disponibilidad:</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="availability" id="availability" value="1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Disponible
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="availability" id="availability" value="0">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Prestado
                                </label>
                              </div>

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

