@extends('template')

@section('judul')
Data Komoditas
@stop

@section('ac-item')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="item/add"><button type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i></button></a>
                @csrf
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Kategori</th>
                  <th>Nama Item</th>
                  <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($item as $rsInf)
            <tr>
                  <td>{{ $rsInf -> kd_item }}</td>
                  <td>{{ App\MGlobal::Get_Kategori($rsInf->kd_kategori) }}</td>
                  <td>{{ $rsInf -> nama_item }}</td>
                  
                  <td>
                        <a href="/item/edit/{{ $rsInf->kd_item }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/item/hapus/{{ $rsInf->kd_item }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop




