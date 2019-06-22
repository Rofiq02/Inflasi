@extends('template')

@section('judul')
Data Pengeluaran
@stop

@section('ac-kategori')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="kategori/add"><button type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i></button></a>
                @csrf
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $rsKat)
            <tr>
                  <td>{{ $rsKat -> kd_kategori }}</td>
                  <td>{{ $rsKat -> nama_kategori }}</td>
                  <td>
                        <a href="/kategori/edit/{{ $rsKat->kd_kategori }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/kategori/hapus/{{ $rsKat->kd_kategori }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop




