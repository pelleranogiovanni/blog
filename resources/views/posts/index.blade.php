@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header">
                      <h2>Lista de Posts</h2>
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#post">
                          Nuevo Post
                        </button>
                  </div>
                  <div class="card-body">

                      <table class="table">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Titulo</th>
                                  <th>Foto</th>
                              </tr>
                          </thead>

                          <tbody>
                              @foreach ($posts as $post)

                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->titulo}}</td>
                                    <td>
                                        <img src="{{$post->foto}}" alt="">
                                    </td>
                                </tr>

                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Nuevo Post</h2>
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" class="form-control" name="titulo">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion">
                            </div>

                            <div class="form-group">
                                <label for="">Contenido</label>
                                <textarea type="text" class="form-control" name="contenido">
                                </textarea>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>

                                <div class="form-group">
                                    <label for="">Categorias</label>
                                    <select name="categorias[]" id="" class="form-control" multiple>
                                        @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>

                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>

            </div>
          </div>
      </div>
  </div>


@endsection
