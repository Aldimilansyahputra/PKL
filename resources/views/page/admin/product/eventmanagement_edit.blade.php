@extends('template.templateedit')

@section('content')
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('ourproduct_page_admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <div class="col-md-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h4><i class="fa fa-edit"></i> Edit Event Management</h4><hr>
                                    <form method="POST" action="{{url('eventedit')}}/{{$products->id}}">
                                        {{csrf_field()}}

                                        <div class="form-group row">
                                            <label for="gambar" class="col-md-2 col-form-label text-md-right">Gambar Product</label>

                                            <div class="col-md-6">
                                                <input id="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{$event->gambar}}" required autocomplete="" autofocus>

                                                @error('gambar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="nama" class="col-md-2 col-form-label text-md-right">Judul</label>

                                            <div class="col-md-6">
                                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="judul" value="{{$event->judul}}" required autocomplete="" autofocus>

                                                @error('nama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-md-2 col-form-label text-md-right">Deskripsi Product</label>

                                            <div class="col-md-6">
                                                <textarea  class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="" required ="" autofocus id="" cols="30" rows="7">{{$event->deskripsi}}</textarea>
                                                @error('deskripsi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection