@extends('template.templateedit')

@section('content')
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('portfolio_admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <div class="col-md-12 mt-2">
                            
                            <div class="card">
                                <div class="card-body">
                                    <h4><i class="fa fa-edit"></i> Partner</h4><hr>
                                    <form method="POST" action="{{url('partnersave')}}/{{$partner->id}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group row">
                                            <label for="gambar" class="col-md-2 col-form-label text-md-right">Gambar </label>
                                            <div class="col-md-6">
                                                <img class=""  width="50%" src="{{ url('gambar/partner/'.$partner->gambar) }}" alt="belum ada gambar" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gambar" class="col-md-2 col-form-label text-md-right">Gambar Baru</label>
                                            <div class="col-md-6">
                                                <input id="gambar" type="file" class="form-control" name="gambar" value="{{ url('gambar/partner/'.$partner->gambar) }}"  autocomplete="" autofocus>

                                                @error('gambar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="nama" class="col-md-2 col-form-label text-md-right">Nama Partner</label>

                                            <div class="col-md-6">
                                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="judul" value="{{$partner->judul}}" required autocomplete="" autofocus>

                                                @error('nama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                       
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i> Update Data
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
