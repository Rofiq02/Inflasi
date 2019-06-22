@extends('template')

@section('judul')
Form Komoditas
@stop

@section('content')


<form id="frmItem" class="form-horizontal" action="{{ url('item/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata kategori -->
                <div class="box-header with-border">
                    <h3 class="box-title">Item</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="kategori" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                        <input type="hidden" name="kd_item" value="{{ $item['kd_item'] }}">
                            <select class="form-control" name="kategori" value="{{ $item['kd_kategori'] }}">
                                <option value="">- Pilih Kategori -</option>
                                @foreach($kategori as $rsKat)
                                <option {{ $item['kd_kategori']==$rsKat['kd_kategori'] ? 'selected' : "" }} value="{{ $rsKat['kd_kategori'] }}">{{ $rsKat['nama_kategori'] }}</option> 
                                @endforeach                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('nama_item')) has-error @endif">
                        <label for="nama_kategori" class="col-sm-2 control-label">Item</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_item" placeholder="Nama Item" name="nama_item" value="{{ $item['nama_item'] }}">
                            @if ($errors->has('nama_item')) <div class="help-block">{{ $errors->first('nama_item') }}</div>@endif
                        </div>
                    </div>    
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">SAVE</button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
